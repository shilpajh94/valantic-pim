    <?php
        if($this->editmode):
            ?><h3>Select Heading Type</h3><?php
            echo $this->select("heading_type", [
                    "store" => [
                        ['h1', 'h1'],
                        ['h2', 'h2'],
                        ['h3', 'h3'],
                        ['h4', 'h4'],
                        ['h5', 'h5'],
                        ['h6', 'h6']
                    ],
                    "default" => "unlimited"
                ]);
        endif;
    ?>

    <?php
        
        $heading_type = 'h2';
        if($this->select("heading_type")->getData())
        {
            $heading_type = $this->select("heading_type")->getData();
        }

        echo "<$heading_type class='orange'>"; 
        echo $this->input("Header_title",["placeholder" =>"Enter Your  Heading"]);
        echo "</$heading_type>"; 
    
    ?>

    <?php
        if($this->editmode):
            ?>
                <h3>
                    Is paragraph's font is mediumn ?
                    <?= $this->checkbox("paragraph_type"); ?>

                </h3>
            <?php
        endif;
        $paragraph_class = '';

        if($this->checkbox("paragraph_type")->isChecked())
        {
            $paragraph_class = 'p-medium';
        }

    ?>

    <p class="<?= $paragraph_class; ?>">
        <?= $this->textarea("QAE_Content",["placeholder" =>"Enter Your  Description"]); ?>
    </p>