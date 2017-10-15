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
        $today = new \DateTime("now");
        $day= $today->format('d');

        $chat  = new Chat();
        $manager->persist($chat);

        $event = new HistoricalEvent();
        $event->setDay(15);
        $event->setMonth(10);
        $event->setYear(1861);
        $event->setContent("W Warszawie wojsko rosyjskie rozbiło demonstrację patriotyczną z okazji rocznicy śmierci Tadeusza Kościuszki.");
        $event->setName("Wojskowa demonstracja");
        $event->setImageUrl("https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Tadeusz_Ko%C5%9Bciuszko.PNG/270px-Tadeusz_Ko%C5%9Bciuszko.PNG");
        $event->setChat($chat);
        $manager->persist($event);


        $event = new HistoricalEvent();
        $event->setDay(15);
        $event->setMonth(10);
        $event->setYear(1944);
        $event->setContent("Ukazało się pierwsze wydanie 'Życia Warszawy'");
        $event->setName("Magazyn 'Życie Warszawy'");
        $event->setImageUrl("https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Dodatek_nadzwyczajny_%C5%BBycia_Warszawy_wyzwolnie_Warszawy_17_stycznia_1945.jpg/800px-Dodatek_nadzwyczajny_%C5%BBycia_Warszawy_wyzwolnie_Warszawy_17_stycznia_1945.jpg");
        $event->setChat($chat);
        $manager->persist($event);

        $event = new HistoricalEvent();
        $event->setDay(15);
        $event->setMonth(10);
        $event->setYear(2006);
        $event->setContent("Odbył się ostatni seans filmowy w warszawskim kinie „Relax”'");
        $event->setName("Kino Relax");
        $event->setImageUrl("https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Kino_relax_warszawa_neon.JPG/800px-Kino_relax_warszawa_neon.JPG");
        $event->setChat($chat);
        $manager->persist($event);


        $event = new HistoricalEvent();
        $event->setDay(15);
        $event->setMonth(10);
        $event->setYear(1933);
        $event->setContent("Reprezentacja Polski przegrała z Czechosłowacją 1:2 w rozegranym w Warszawie meczu eliminacyjnym do II Mistrzostw Świata w Piłce Nożnej we Włoszech.");
        $event->setName("Reprezentacja Polski przegrała z Czechosłowacją 1:2");
        $event->setImageUrl("https://i.pinimg.com/originals/b3/df/76/b3df767cd60b9137d60e99f336b80b44.jpg");
        $event->setChat($chat);
        $manager->persist($event);


        $event = new HistoricalEvent();
        $event->setDay(16);
        $event->setMonth(10);
        $event->setYear(1940);
        $event->setContent("Oficjalnie utworzono warszawskie getto.");
        $event->setName("Warszawskie getto");
        $event->setImageUrl("https://upload.wikimedia.org/wikipedia/commons/thumb/d/d1/Jewish_man_humiliated_by_German_soldiers_%28Warsaw%2C_1939%29.jpg/800px-Jewish_man_humiliated_by_German_soldiers_%28Warsaw%2C_1939%29.jpg");
        $event->setChat($chat);
        $manager->persist($event);


        $event = new HistoricalEvent();
        $event->setDay(16);
        $event->setMonth(10);
        $event->setYear(1940);
        $event->setContent("W pierwszych pięciu publicznych egzekucjach w okupowanej Warszawie powieszono 50 więźniów Pawiaka.");
        $event->setName("Okupowana Warszawa");
        $event->setImageUrl("https://upload.wikimedia.org/wikipedia/commons/thumb/5/52/Wi%C4%99zienie_Pawiak_przed_1939.jpg/1280px-Wi%C4%99zienie_Pawiak_przed_1939.jpg");
        $event->setChat($chat);
        $manager->persist($event);



        $manager->flush();
    }
}