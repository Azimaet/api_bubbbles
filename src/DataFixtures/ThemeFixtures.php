<?php

namespace App\DataFixtures;

use App\Entity\Theme;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ThemeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $labels = [
            "night_diving",
            "cave_diving",
            "ice_diving",
            "wreck_diving",
            "archeology",
            "photography",
            "rescue",
            "wildlife_rescue",
            "technical_intervention",
            "scooter",
            "rebreather"
        ];

        foreach ($labels as $i => $label) {
            $theme = new Theme();
            $theme->setId($i + 1);
            $theme->setName($label);
            $manager->persist($theme);
        }

        $manager->flush();
    }
}
