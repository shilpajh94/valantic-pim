<?php
// src/Twig/AppExtension.php
// namespace App\Twig;
namespace CatalogBundle\TwigExtension;

use \Pimcore\Model\Asset\Image;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class TwigExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('getImageThumbnail', [$this, 'getImageThumbnail']),
            new TwigFunction('getAssetFullPathCompatibleToS3', [$this, 'getAssetFullPathCompatibleToS3']),
            new TwigFunction('md5Twig', [$this, 'md5Twig']),
            new TwigFunction('explodePHP_EOL', [$this, 'explodePHP_EOL']),
        ];
    }

    /**
     * @param Image|Pimcore\Model\Document\Tag\Image $image
     * @param string $selectedThumbnaiWidth
     *
     * @return Image\Thumbnail
     */
    public function getImageThumbnail($image, ?string $selectedThumbnaiWidth): ?Image\Thumbnail
    {
        $thumbnail = null;

        if(array_key_exists($selectedThumbnaiWidth,CATALOG_IMAGE_THUBNAILS))
        {
            $thumbnail =  $image->getThumbnail(CATALOG_IMAGE_THUBNAILS[$selectedThumbnaiWidth]);
        }

        if($thumbnail === null){
            $thumbnail =  $image->getThumbnail(CATALOG_IMAGE_THUBNAILS['Original']);
        }

        return $thumbnail !== "" ? $thumbnail : null ;
    }

    public function getAssetFullPathCompatibleToS3($pdfElement)
    {
        return \S3CustomizationBundle\Lib\Utils::getAssetFullPathCompatibleToS3($pdfElement);
    }

    public function md5Twig($string)
    {
        return md5($string);
    }

    public function explodePHP_EOL($string)
    {
        return explode(PHP_EOL, $string);
    }
}

?>
