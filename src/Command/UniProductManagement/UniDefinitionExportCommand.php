<?php

declare(strict_types=1);

namespace App\Command\UniProductManagement;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;

#[AsCommand(name: 'app:uni:definition:export', description: 'Extracts header comments from var/classes/definition_Uni* files')]
class UniDefinitionExportCommand extends AbstractCommand
{
    /** @var string[] */
    private array $fieldTypes = [];

    protected function configure(): void
    {
        $this
            ->setHelp('This command extracts the header comments from all definition_Uni* files in the var/classes directory')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // Initialize field types array
        $this->fieldTypes = [];

        // Find all definition_Uni* files
        $finder = new Finder();
        $finder->files()
            ->in('var/classes')
            ->name('definition_Uni*.php')
        ;

        if (!$finder->hasResults()) {
            $this->output->writeln('<fg=red;options=bold>No definition_Uni* files found in var/classes directory</>');

            return self::FAILURE;
        }

        foreach ($finder as $file) {
            $filePath = $file->getRealPath();
            $fileName = $file->getFilename();

            // Extract class name by removing "definition_" prefix and ".php" suffix
            $className = str_replace(['definition_', '.php'], '', $fileName);

            $this->output->writeln('<fg=yellow;options=bold>=== ' . $className . ' ===</>');

            // Extract header comments using line-by-line reading for memory efficiency
            $this->extractHeaderComment($filePath, $className);
        }

        $this->output->writeln('');

        // Output the list of all field types used in all definitions
        $this->outputFieldTypes();

        return self::SUCCESS;
    }

    /**
     * Outputs the list of all field types used in all definitions.
     */
    private function outputFieldTypes(): void
    {
        if ($this->fieldTypes === []) {
            $this->output->writeln('<fg=yellow>No field types found in any definition</>');

            return;
        }

        sort($this->fieldTypes);

        $this->output->writeln('<fg=green;options=bold>=== All Field Types Used in Definitions ===</>');
        $this->output->writeln('');

        $this->fieldTypes = array_unique($this->fieldTypes);

        $explanations = [
            'booleanSelect' => 'true/false',
            'calculatedValue' => 'something calculated based on other fields',
            'checkbox' => 'true/false field',
            'country' => 'country field with list of countries',
            'fieldcollections' => 'set of attributes that can be repeated',
            'image' => 'image from the DAM',
            'input' => 'a single line of text',
            'localizedfields' => 'field container for localized fields',
            'manyToManyObjectRelation' => 'relation to multiple objects',
            'manyToOneRelation' => 'relation to a single object',
            'multiselect' => 'multi-item selection from a list',
            'numeric' => 'field for numbers (integer or float)',
            'objectbricks' => 'set of attributes that can be added to an object',
            'quantityValue' => 'field for number with unit with support for conversion',
            'select' => 'an item from a list',
            'textarea' => 'multi-line text field (no formatting)',
            'wysiwyg' => 'rich text editor',
        ];

        foreach ($this->fieldTypes as $fieldType) {
            $this->output->writeln(sprintf('- %s: %s', $fieldType, $explanations[$fieldType] ?? '(no explanation available)'));
        }

        $this->output->writeln('');
    }

    /**
     * Extracts header comment from a file by reading it line by line
     * and for fieldcollection fields, finds the allowed field collection types.
     *
     * @param string $filePath Path to the file
     * @param string $className Name of the class being processed
     */
    private function extractHeaderComment(string $filePath, string $className): void
    {
        // Extract the header comment from the file
        $commentLines = $this->extractCommentFromFile($filePath);

        if ($commentLines === []) {
            $this->output->writeln('<fg=yellow>No header comment found in ' . basename($filePath) . '</>');

            return;
        }

        // Output the extracted comment
        foreach ($commentLines as $line) {
            $this->output->writeln($line);

            // Extract field type from the line and add it to the field types array
            $this->extractFieldTypeFromLine($line);
        }
        $this->output->writeln('');
        $this->output->writeln('');

        // Find fieldcollection and objectbrick fields in the comment
        $fieldcollectionFields = $this->findFieldsInComment($commentLines, 'fieldcollections');
        $objectbrickFields = $this->findFieldsInComment($commentLines, 'objectbricks');

        // Process fieldcollection fields
        if ($fieldcollectionFields !== []) {
            $this->processFieldDefinitions(
                $filePath,
                $fieldcollectionFields,
                'fieldcollections',
                'Fieldcollections in ' . $className,
                'var/classes/fieldcollections/%s.php',
                'Fieldcollection',
            );
        }

        // Process objectbrick fields
        if ($objectbrickFields !== []) {
            $this->processFieldDefinitions(
                $filePath,
                $objectbrickFields,
                'objectbricks',
                'Objectbricks in ' . $className,
                'var/classes/objectbricks/%s.php',
                'Objectbrick',
            );
        }

        $this->output->writeln('');
    }

    /**
     * Extracts field type from a line of comment and adds it to the field types array.
     *
     * @param string $line Line of comment
     */
    private function extractFieldTypeFromLine(string $line): void
    {
        // Pattern to match field definitions in comments
        // Example: "- fieldName [fieldType]"
        if (preg_match('/^--? ([a-zA-Z0-9_]+) \[([a-zA-Z0-9_]+)\]$/', $line, $matches)) {
            $fieldType = $matches[2];

            $this->fieldTypes[] = $fieldType;

            // Skip fieldcollections and objectbricks as they are handled separately
            if ($fieldType === 'fieldcollections' || $fieldType === 'objectbricks') {
                return;
            }
        }
    }

    /**
     * Extracts comment lines from a file.
     *
     * @param string $filePath Path to the file
     * @param string|null $warningPrefix Optional prefix for warning messages
     *
     * @return string[] Array of comment lines
     */
    private function extractCommentFromFile(string $filePath, ?string $warningPrefix = null): array
    {
        $fileHandle = fopen($filePath, 'r');

        if (!$fileHandle) {
            $warningMessage = sprintf('Could not open file %s', $filePath);

            if ($warningPrefix !== null) {
                $warningMessage = $warningPrefix . $warningMessage;
            }
            $this->output->writeln('<fg=yellow>' . $warningMessage . '</>');

            return [];
        }

        $inComment = false;
        $commentLines = [];
        $lineCount = 0;

        // Read file line by line
        while (($line = fgets($fileHandle)) !== false) {
            $lineCount++;

            // Check for comment start
            if (!$inComment && str_contains($line, '/**')) {
                $inComment = true;

                // If the comment starts and ends on the same line, handle it
                if (str_contains($line, '*/')) {
                    $commentLine = trim(substr($line, strpos($line, '/**') + 3, strpos($line, '*/') - strpos($line, '/**') - 3));

                    if ($commentLine !== '' && $commentLine !== '0') {
                        $commentLines[] = $commentLine;
                    }

                    break;
                }

                continue;
            }

            // Collect comment lines
            if ($inComment) {
                // Check for comment end
                if (str_contains($line, '*/')) {
                    $commentLine = trim(substr($line, 0, strpos($line, '*/')));

                    if (str_starts_with($commentLine, '*')) {
                        $commentLine = trim(substr($commentLine, 1));
                    }

                    if ($commentLine !== '' && $commentLine !== '0') {
                        $commentLines[] = $commentLine;
                    }

                    break;
                }

                // Process comment line
                $commentLine = trim($line);

                if (str_starts_with($commentLine, '*')) {
                    $commentLine = trim(substr($commentLine, 1));
                }

                if ($commentLine !== '' && $commentLine !== '0') {
                    $commentLines[] = $commentLine;
                }
            }
        }

        fclose($fileHandle);

        return $commentLines;
    }

    /**
     * Finds fields of a specific type in comment lines.
     *
     * @param string[] $commentLines Array of comment lines
     * @param string $fieldType Type of field to find (e.g., 'fieldcollections', 'objectbricks')
     *
     * @return string[] Array of field names
     */
    private function findFieldsInComment(array $commentLines, string $fieldType): array
    {
        $fields = [];
        $pattern = sprintf('/^- ([a-zA-Z0-9_]+) \[%s\]$/', $fieldType);

        foreach ($commentLines as $line) {
            if (preg_match($pattern, $line, $matches)) {
                $fields[] = $matches[1];
            }
        }

        return $fields;
    }

    /**
     * Processes field definitions of a specific type.
     *
     * @param string $filePath Path to the file containing field definitions
     * @param string[] $fields Array of field names
     * @param string $fieldType Type of field (e.g., 'fieldcollections', 'objectbricks')
     * @param string $sectionTitle Title for the section in output
     * @param string $definitionFilePathFormat Format string for definition file paths
     * @param string $typeLabel Label for the type in output
     */
    private function processFieldDefinitions(
        string $filePath,
        array $fields,
        string $fieldType,
        string $sectionTitle,
        string $definitionFilePathFormat,
        string $typeLabel,
    ): void {
        $this->output->writeln('');
        $this->output->writeln('<fg=yellow;options=bold>' . $sectionTitle . '</>');

        // Read the entire file to search for allowed types
        $fileContent = file_get_contents($filePath);

        if ($fileContent === false) {
            $this->output->writeln('<fg=yellow>Could not read file content for ' . basename($filePath) . '</>');

            return;
        }

        foreach ($fields as $fieldName) {
            $output = sprintf('- %s [%s]: ', $fieldName, $fieldType);

            // Find the field definition in the class definition
            $pattern = "/'name' => '{$fieldName}',.*?'allowedTypes' => \\s*array \\(.*?\\),/s";

            if (preg_match($pattern, $fileContent, $matches)) {
                $fieldDefinition = $matches[0];

                // Extract allowed types
                $allowedTypes = [];

                if (preg_match_all("/[0-9]+ => '([^']+)'/", $fieldDefinition, $typeMatches)) {
                    $allowedTypes = $typeMatches[1];
                }

                if ($allowedTypes !== []) {
                    $output .= implode(', ', $allowedTypes);
                    $this->output->writeln($output);

                    // Extract header comments from definition files
                    foreach ($allowedTypes as $type) {
                        $this->extractDefinitionHeaderComment($type, $definitionFilePathFormat, $typeLabel);
                    }
                } else {
                    $output .= 'No allowed types found';
                    $this->output->writeln($output);
                }
            } else {
                $output .= 'Field definition not found in class definition';
                $this->output->writeln($output);
            }
        }
        $this->output->writeln('');
        $this->output->writeln('');
    }

    /**
     * Extracts header comment from a definition file.
     *
     * @param string $type The type name
     * @param string $filePathFormat Format string for the file path
     * @param string $typeLabel Label for the type in output
     */
    private function extractDefinitionHeaderComment(string $type, string $filePathFormat, string $typeLabel): void
    {
        $filePath = sprintf($filePathFormat, $type);

        if (!file_exists($filePath)) {
            $this->output->writeln('<fg=yellow>  ' . $typeLabel . ' definition file not found: ' . $filePath . '</>');

            return;
        }

        $commentLines = $this->extractCommentFromFile($filePath, '  ');

        if ($commentLines === []) {
            $this->output->writeln('<fg=yellow>  No header comment found in ' . strtolower($typeLabel) . ': ' . $type . '</>');

            return;
        }

        // Output the extracted comment with indentation, including parent class information
        $this->output->writeln('  ' . $type);

        foreach ($commentLines as $line) {
            $this->output->writeln('    ' . $line);

            $this->extractFieldTypeFromLine($line);
        }
    }
}
