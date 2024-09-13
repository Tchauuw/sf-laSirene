<?php

namespace App\DataFixtures;

use App\Entity\Geste;
use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $nomTags=array("Facile", "Top", "Éduque tes parents", "Jardinage", "Solidarité", "GreenIT", "Économique", "Réduis tes déchets", "Organisation");
        $tabTags=array();
        foreach($nomTags as $t) {
            $tag =new Tag($t);
            $tabTags[]=$tag;
            $manager->persist($tag);
        }
        // les noms des gestes sont associées à des classes css qui permettent d'afficher correctement chaque vignette !
        $nomGestes=array("baleine", "crabe","saintjacques","pieuvre","pelican","espadon","pingouin","goeland","bernard", "sterne");
        $titreGestes=array("Fini les bouteilles, je bois l’eau du robinet",
            "Au lieu de jeter, je revends, je donne ou je répare",
            "Je colle un « stop pub » sur ma boîte aux lettres",
            "Je composte les épluchures et les restes de cuisine",
            "Pour les courses, je prends mon cabas",
            "J’achète de préférence en vrac ou à la coupe",
            "Je range mon frigo pour gaspiller moins",
            "Je recycle les déchets verts de mon jardin",
            "Je donne les vêtements dont je ne veux plus",
            "Je n’imprime que si nécessaire, plutôt recto-verso"
        );

        // le contenu HTML devra être conservé pour l'affichage !
        $impactGestes=array("Boire l’eau du robinet, c’est <strong>12 kg</strong> de bouteilles  plastiques utilisées en moins par an et par personne.",
            "Revendre, donner ou réparer, c’est <strong>13 kg</strong> de déchets jetés en moins par an et par Personne",
            "Coller un « stop pub » sur sa boîte-aux-lettres, c’est <strong>35 kg</strong> de papier économisés par an et par foyer",
            "Composter ses restes de cuisine, c’est <strong>40 kg</strong> de déchets jetés en moins par an et par Personne",
            "Utiliser un cabas, c’est <strong>2 kg</strong> de sacs plastiques jetés en moins par an et par personne.",
            "Acheter en vrac ou à la coupe, c’est <strong>2 kg</strong> d’emballages jetés en moins par an et par Personne",
            "Ranger son frigo, c’est <strong>7 kg</strong> d’aliments encore emballés gaspillés en moins par an et par Personne",
            "Broyer, pailler, composter, c’est <strong>90 kg</strong> de déchets verts jetés en moins par an et par Personne",
            "Donner une seconde vie à ses vêtements, c’est <strong>7 kg</strong> de déchets jetés en moins par an et par Personne",
            "Limiter ses impressions, c’est <strong>6 kg</strong> de papier économisés par an et par personne"
        );
        $descriptionGestes=array("Je ne m’échine plus à porter de lourds packs d’eau et je soulage ma poubelle de quantité de bouteilles plastiques. L’eau du robinet coûte <strong>100 à 300 fois</strong>  moins cher que l’eau en bouteille. Un léger goût de chlore ? Il s’en va dès qu’on laisse un peu reposer l’eau dans une carafe.",
            "C’est cassé ? Ça peut peut-être s’arranger.  J’ai le réflexe de <strong>réparer</strong> ou de <strong>faire réparer</strong> mon mobilier, ma cafetière, mes appareils électroménagers… au lieu de toujours les racheter neufs.  Pour prolonger la durée de vie de mon matériel ou de mes meubles, je les entretiens régulièrement. Et ceux qui ne me servent plus, je les <strong>donne</strong> ou je les <strong>revends</strong>, ils peuvent encore être utiles !",
            "Un foyer reçoit, en moyenne, 35 kilos de prospectus par an.  Cela représente beaucoup de papiers sur lesquels on jette à peine un coup d’œil et qui finissent très souvent à la poubelle.  Un autocollant <strong>« stop pub »</strong> bien en vue sur la boîte aux lettres signale que je refuse ces imprimés publicitaires.  Disponible à l'accueil de la CdA et de vos mairies.",
            "Je composte dans un coin du jardin ou dans un bac les épluchures de fruits et légumes et les restes de cuisine avec les déchets verts.  Je fabrique ainsi un engrais naturel et <strong>je préserve l’environnement</strong> en réduisant la quantité de déchets à transporter et à traiter.  L’agglomération propose des composteurs à 10€. Plus d'infos sur le site de l'Agglo.  Vous habitez en appartement et souhaitez pratiquer le compostage entre voisins ? La CdA peut vous accompagner !",
            "Je dis stop aux sacs plastiques.  Peu solides, trop nombreux, ils finissent vite à la poubelle et lorsqu’on les retrouve dans la nature, ils mettent des centaines d’années à disparaître.  Je leur préfère des <strong>cabas</strong> réutilisables ou mon joli panier. J’ai toujours dans mon sac à main une petite poche pliée en tissu pour les achats imprévus.",
            "Je privilégie les produits vendus au <strong>détail</strong>, <strong>en vrac</strong> ou <strong>à la coupe</strong> : fruits, légumes, céréales, fromages, viandes, etc.  J’achète ainsi la juste quantité. Pour réduire mes déchets d'emballage, j'opte également pour les grands formats plutôt que pour les portions individuelles, si la quantité est adaptée à ma consommation.  J’achète, chaque fois que possible, des écorecharges pour les produits ménagers.",
            "Un français jette en moyenne 20 kilos de nourriture par an, <strong>quel gâchis</strong> !  J’évite ce gaspillage en préparant ma liste de courses et en vérifiant les dates de péremption au moment de mes achats.  A la maison, je cuisine la quantité nécessaire, j’apprends (et je prends plaisir) à accommoder les restes.  Dans le frigo, je range les aliments au bon endroit en fonction des zones de fraîcheur et je les place dans des boîtes fermées pour mieux les conserver.",
            "Les feuilles mortes, les tontes de gazon, les tailles d’arbustes une fois broyées sont plus utiles au pied de mes arbres, de mes massifs ou dans mon potager qu’en déchèterie.  Ces résidus du jardin peuvent être utilisés en <strong>paillage</strong>. Répandus en couche de 5 cm au pied des plantations, ils les nourrissent et les protègent des temps trop secs ou trop froids.",
            "Les enfants ont grandi, cette veste ne me va plus : <strong>j’offre une seconde vie</strong> à ces vêtements en les glissant dans l’un des conteneurs « textile » répartis dans l’agglomération et je fais des heureux !  Les articles en mauvais état sont quant à eux recyclés.  Ces conteneurs accueillent aussi les chaussures, la petite maroquinerie et le linge de maison. Je peux également choisir de donner aux associations.",
            "Les messages électroniques et pièces jointes que je reçois sont bien lisibles sur mon écran, inutile de les imprimer tous !  Si je dois l’envisager pour certains documents, je choisis l’option <strong>recto-verso</strong>. <br>J’économise aussi le papier en utilisant comme brouillon le verso libre des pages déjà utilisées.<br> Faites également le ménage dans votre boite aux lettres : cela réduira l'espace disques sur les serveurs. Les messages électroniques ont un impact non négligeable sur l'environnement."
        );

        // les images sont présents dans le dossier images !
        $imageGestes=array("42.png","36.png","43.png","4.png","5.png","6.png","7.png","40.png","44.png","9.png");

        $nb=count($nomGestes);

        for($i=0;$i<$nb;$i++) {
            $geste = new Geste(
                $nomGestes[$i] . "",
                $titreGestes[$i] . "",
                $impactGestes[$i] . "",
                $descriptionGestes[$i] . "",
                $imageGestes[$i] . ""
            );
            // on ajoute deux tags au geste...
            $geste->addTag($tabTags[mt_rand(0,count($tabTags)-1)]);
            $geste->addTag($tabTags[mt_rand(0,count($tabTags)-1)]);
            $manager->persist($geste);
        }

        $manager->flush();
    }
}
