<?php


namespace App\Helper;


use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Finder\Finder;

class HomeHelper
{
    private static $BACKGROUND_IMAGES_LOCATION = 'assets/img/p-section-backgrounds/';

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @var Finder
     */
    private $finder;

    /**
     * HomeHelper constructor.
     * @param ContainerInterface $container
     * @param Finder $finder
     */
    public function __construct(ContainerInterface $container, Finder $finder)
    {
        $this->container = $container;
        $this->finder = $finder;
    }

    /**
     * Get random image.
     * @return string
     */
    public function getRandomImage(): string
    {
        $finder = $this->finder;
        $publicPath = $this->container->getParameter('kernel.project_dir') . '/public/';

        $backgroundsPath = $publicPath . self::$BACKGROUND_IMAGES_LOCATION;
        $finder->files()->in($backgroundsPath);

        $backgroundsCount = $finder->count();
        $randomImageIndex = rand(1, $backgroundsCount);

        $randomImage = "";
        foreach ($finder as $file) {
            if ($randomImageIndex == 0) {
                break;
            }
            $randomImage = '/assets/img/p-section-backgrounds/' . $file->getFilename();
            $randomImageIndex--;
        }

        return $randomImage;
    }

}
