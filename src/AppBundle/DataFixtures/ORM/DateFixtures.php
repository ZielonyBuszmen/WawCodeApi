<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Chat;
use AppBundle\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use AppBundle\Entity\HistoricalEvent;
use Doctrine\Common\Persistence\ObjectManager;

class DateFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $names=['Bitwa o świerzaki', 'Wybudowanie monopolowego', 'Tramwaje jeżdżom'];
        $content = 'Lorem ipsum trlelele kolejny wyraz szesc siedem osiem';
        for ($i = 0; $i < 3; $i++) {
            $event = new HistoricalEvent();
            $event->setDay(15);
            $event->setMonth(10);
            $event->setYear(mt_rand(1000, 2000));
            $event->setName($names[$i]);
            $event->setContent($names[$i]." ".$content);
            $manager->persist($event);
        }

        $names=['Pawlacze i kołacze', 'Ruskie uciekli', 'Tramwaje jeżdżom'];
        $content = 'Lorem ipsum trlelele kolejny wyraz szesc siedem osiem';
        for ($i = 0; $i < 2; $i++) {
            $event = new HistoricalEvent();
            $event->setDay(14);
            $event->setMonth(10);
            $event->setYear(mt_rand(1000, 2000));
            $event->setName($names[$i]);
            $event->setContent($names[$i]." ".$content);
            $manager->persist($event);
        }

        $names=['Niemieca bili baby', 'Pierwsze światowe wdychanie spalin', 'Tramwaje jeżdżom'];
        $content = 'Lorem ipsum trlelele kolejny wyraz szesc siedem osiem';
        for ($i = 0; $i < 2; $i++) {
            $event = new HistoricalEvent();
            $event->setDay(16);
            $event->setMonth(10);
            $event->setYear(mt_rand(1000, 2017));
            $event->setName($names[$i]);
            $event->setContent($names[$i]." ".$content);
            $manager->persist($event);
        }

        $chat = new Chat();
        $manager->persist($chat);

        $comment1 = new Comment('Komar komentuje', 'Komar', $chat);
        $manager->persist($comment1);
        $comment2 = new Comment('Maciek komentuje', 'Maćku', $chat);
        $manager->persist($comment2);
        $comment3 = new Comment('Ilya komentuje', 'Ilya', $chat);
        $manager->persist($comment3);
        $comment4 = new Comment('Piotrku komentuje', 'Piotrku', $chat);
        $manager->persist($comment4);
        $comment5 = new Comment('Pandu komentuje', 'Pandu', $chat);
        $manager->persist($comment5);

        $manager->flush();
    }
}