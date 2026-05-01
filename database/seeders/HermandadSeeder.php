<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HermandadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        \App\Models\Hermandad::create([
            'nombre' => 'La Macarena',
            'sede' => 'Basílica de la Macarena',
            'fundacion' => '1595',
            'slug' => 'la-macarena',
            'dia_salida' => 'Madrugá',
            'imagen_tarjeta' => 'img/Macarena.jpg',
            'imagen_basilica' => 'img/macarena/basilicaMacarena.jpg',
            'imagen_cristo' => 'img/macarena/jesusSentencia.jpg',
            'imagen_virgen' => 'img/macarena/palioMacarena.jpg',
            
            // Descripción corta para la tarjeta del listado
            'descripcion' => 'Es una hermandad de culto católico que tiene sede en la basílica de Santa María de la Esperanza Macarena, en el distrito Casco Antiguo y barrio Macarena',
            
            // Historia larga para la página de detalle
            'historia' => 'Siglos XVI y XVII
                            La hermandad fue fundada en 1595 por el gremio de hortelanos en el convento de San Basilio (collación de Omnium Sanctorum). Sus primeras reglas fueron aprobadas por el cardenal Rodrigo de Castro Osorio.
                            En 1615 comenzó a procesionar, inicialmente detrás del Cristo de la Hermandad de la Humildad, por autorización del provisor Gonzalo de Campo. En 1624 realizó su primera estación de penitencia independiente (Viernes Santo), pasando en 1628 a la Madrugá. En 1653 se trasladó a la parroquia de San Gil y se fusionó con la cofradía del Rosario, incorporando la advocación de Jesús de la Sentencia.

                            Siglos XX y XXI
                            En 1936, durante los disturbios de la Guerra Civil, la iglesia de San Gil fue incendiada, pero las imágenes se salvaron al ser trasladadas previamente. Posteriormente se construyó la Basílica de la Macarena, donde la hermandad se estableció definitivamente en 1949.
                            En 1964, la Virgen de la Esperanza Macarena fue coronada canónicamente en la Catedral de Sevilla.
                            En 1989, 1995, 2010 y 2014 se celebraron importantes salidas extraordinarias y actos conmemorativos (XXV aniversario de la Coronación, IV Centenario fundacional, beatificación de Madre María de la Purísima y 50 aniversario de la Coronación). La procesión de 2010 fue considerada una de las más multitudinarias de la historia de Sevilla.',
            
            'musica' => 'Paso de Cristo: Banda de Cornetas y Tambores Centuria Romana Macarena. Paso de Palio: Sociedad Filarmónica Nuestra Señora del Carmen de Salteras',
            
            'info_cristo' => 'El conjunto escultórico de Nuestro Padre Jesús de la Sentencia representa el juicio de Jesús narrado por San Mateo en su evangelio, que corresponde con la primera estación de la Pasión de Cristo. En el misterio aparece Jesucristo maniatado en el momento en que un sanedrita judío publica su sentencia, en presencia de Poncio Pilato, que està sentado en un trono; su mujer Claudia Procula, tres soldados romanos, otro judío y un esclavo etíope que ofrece a Pilato la palangana en la que se lavó las manos.',
            
            'info_virgen' => 'El segundo paso de la hermandad alberga bajo palio a María Santísima de la Esperanza Macarena, una imagen de escultor anónimo del siglo XVII atribuida al taller de Pedro Roldán que fue coronada canónicamente en 1964. Posee corona de oro de ley enriquecida con brillantes diseñada por Rodríguez Ojeda en 1913, y sus reconocidas mariquillas en el pecho, conformando cinco rosas de cristal de roca verde que simbolizan los Siete Dolores padecidos por la Virgen María. El paso de palio es de estilo neobarroco. Posee toda la orfebrería en plata de ley, con candelabros de cola (1939) y peana (1941) de Bautista Lozano, y candelería de Seco Velasco (1955). Los varales son de Cayetano González y Bautista, Landa y Fernández (1935-1936), y lleva dos miniaturas en plata representando a la Virgen del Pilar y a la Virgen de Guadalupe.',
        ]);



        \App\Models\Hermandad::create([
            'nombre' => 'El Gran Poder',
            'sede' => 'Basílica de Jesús del Gran Poder',
            'fundacion' => '1431',
            'slug' => 'gran-poder',
            'dia_salida' => 'Madrugá',
            'imagen_tarjeta' => 'img/GranPoder.jpg',
            'imagen_basilica' => 'img/granPoder/basilica.png',
            'imagen_cristo' => 'img/granPoder/jesusGranPoder.jpg',
            'imagen_virgen' => 'img/granPoder/palioMayorDolor.JPG',
            
            // Descripción corta para la tarjeta del listado
            'descripcion' => 'La Hermandad del Gran Poder es una cofradía católica de Sevilla, Andalucía, España. Fue fundada en el siglo XV. Realiza su estación de penitencia en la madrugada del Viernes Santo.',
            
            // Historia larga para la página de detalle
            'historia' => 'Conocido popularmente como el "Señor de Sevilla", su imagen trasciende lo religioso para convertirse en un icono cultural de la ciudad. 
                            En el año 1431 se funda en el monasterio de San Benito de Calatrava por los Duques de Medina Sidonia. Originalmente, su advocación era la de la "Cofradía del Poder y Traspaso de Nuestra Señora"
                            Entre 1697 y 1703 la hermandad tuvo su sede en el convento de San Acacio, de la orden agustina. En 1703, definitivamente se estableció en la iglesia parroquial de San Lorenzo, pero en 1965 se construyço una nueva sede que se ubica en la misma plaza.
                            Respecto a su advocación de Jesús del Gran Poder esta quedó fijada a partir de 1709 por obligarse mediante sentencia judicial a cambiar la original de Jesús Nazareno. La Hermandad del Silencio demandó a la Hermandad del Traspaso solicitando prohibir la doble advocación en las tallas cristíferas de ambas corporaciones.',
            'musica' => 'No lleva música',
            
            'info_cristo' => 'Conocido también como el Señor de Sevilla, el Jesús del Gran Poder se trata de una colosal talla de gran calado devocional dentro y fuera de la ciudad hispalense, la cual es obra del imaginero cordobés Juan de Mesa, discípulo de Juan Martínez Montañés, a quien se le atribuía erróneamente durante siglos, al no tener autoría documentada.
                              La escultura de Jesús mide 1,81 metros de altura y está realizada en madera de cedro. El paso del Señor se contrató con el imaginero Francisco Antonio Gijón en 1688 y fue entregado en 1692. ',
            
            'info_virgen' => 'El segundo paso representa la Virgen del Mayor Dolor y Traspaso acompañada por San Juan Evangelista, bajo palio. No es la primitiva titular de la hermandad ya que a finales del siglo XVIII se encargó la cabeza actual. La imagen de la Virgen es de origen anónimo del siglo XVIII. Está realizada en madera de cedro y pino y mide 1,74 metros.
                               El paso palio es una obra de orfebrería y bordados y se estrenó en 1903. El palio fue realizado por Juan Manuel Rodríguez Ojeda, inspirado en un frontal ejecutado sobre terciopelo granate y es de los llamados "de cajón", como el primitivo de la Virgen de los Reyes.',
        ]);
        

        \App\Models\Hermandad::create([
            'nombre' => 'La Esperanza de Triana',
            'sede' => 'Capilla de los Marineros',
            'fundacion' => '1418',
            'slug' => 'triana',
            'dia_salida' => 'Madrugá',
            'imagen_tarjeta' => 'img/Triana.jpg',
            'imagen_basilica' => 'img/triana/capillaTriana.jpg',
            'imagen_cristo' => 'img/triana/tresCaidas.jpg',
            'imagen_virgen' => 'img/triana/palioTriaana.jpg',
            
            // Descripción corta para la tarjeta del listado
            'descripcion' => 'La Hermandad de la Esperanza de Triana es una cofradía católica del barrio de Triana, en Sevilla, Andalucía, España.',
            
            // Historia larga para la página de detalle
            'historia' => 'La Cofradía de Nuestra Señora de la Esperanza fue fundada en 1418 con miembros del gremio de los ceramistas en la iglesia de Santa Ana. En 1616 la Cofradía de Nuestra Señora de la Esperanza y San Juan Evangelista se fusionó con la Cofradía de las Tres Caídas, teniendo la cofradía resultante su sede en la iglesia del Espíritu Santo.
                           En 1736 la cofradía se trasladó a la capilla de los Montebernardo de la iglesia de Santa Ana. La capilla resultó dañada por el terremoto de 1755 y la cofradía se trasladó al convento de Nuestra Señora de los Remedios. En 1758 la cofradía adquirió un solar en el que hubo un par de casas de una capellanía abandonada que fue dependiente de la iglesia de Santa Ana. En esa parcela, la cofradía empezó la construcción de su capilla. Permaneció en el convento de los Remedios hasta 1766.
                           La revolución liberal de 1868 privó a la hermandad de su sede y sus enseres. Se reorganizó en 1888 con nuevos enseres hechos por el platero Justino de Guzmán y el bordador Alonso de Ojeda.
                            La sede actual de la hermandad es la capilla de los Marineros, en la calle Pureza. Este templo ya fue sede de la hermandad desde 1815 hasta la revolución liberal de 1868. Entonces pasó a manos privadas, siendo templo anglicano, teatro y almacén.
                            Desde 1868 la sede de la hermandad fue la cercana iglesia de San Jacinto.
                            En 1953 la hermandad decidió la remodelación de la capilla de los Marineros, a la que se trasladó el Viernes Santo de 1962, donde permanece desde entonces.',
            
            'musica' => 'Delante de la cruz de guía, la banda de San Juan Evangelista. Tras el misterio, la de cornetas y tambores del Santísimo Cristo de las Tres Caídas. La Banda de Música María Santísima de la Victoria, las Cigarreras, tras el palio',
            
            'info_cristo' => 'Este Jesús portando la cruz es atribuido a Marcos Cabrera por su semejanza con el Nazareno de la localidad de Utrera, de este mismo autor. Pudo haberse hecho entre 1608 y 1630. Fue restaurado en 1899. Tuvo una restauración y reforma en 1904 por Manuel Gutiérrez Cano, en la que se le cambió el cabello natural en la cabeza y la barba por un pelo hecho de pasta y se le colocó una corona de espinas del mismo material.
                                El paso de misterio muestra a Jesús con la cruz al hombro en su tercera caída, que es ayudado por el cirineo en presencia de un soldado romano a caballo, el cual guía al Señor en su camino al Gólgota, y una mujer con dos niños. Todas estas imágenes, menos la de Jesús, fueron realizadas por Castillo Lastrucci entre 1938 y 1941.',
            
            'info_virgen' => 'La Virgen de la Esperanza, conocida como la Esperanza de Triana o "Reina de Triana", es una imagen religiosa de autor desconocido que ha sufrido importantes remodelaciones y restauraciones a lo largo de su historia, los estudios actuales apuntan a una posible atribución de la imagen dolorosa al imaginero Juan Bautista Petroni. En 1898 un incendio asoló el altar donde se encontraba esta Virgen en la iglesia de San Jacinto. Por ello, Gumersindo Jiménez de Astorga intervino en el rostro y las manos de la dolorosa.
                              La Virgen cuenta con una corona de plata dorada con ángeles de marfil realizada por Rafael Barbero en 1963 y otra de oro realizada por Francisco Fernández y Juan Borrero, de Orfebrería Triana, entre 1983 y 1984.  ',
        ]);





        \App\Models\Hermandad::create([
            'nombre' => 'San Gonzalo',
            'sede' => 'Parroquia de San Gonzalo',
            'fundacion' => '1942',
            'slug' => 'san-gonzalo',
            'dia_salida' => 'Lunes Santo',
            'imagen_tarjeta' => 'img/sanGonzalo.jpg',
            'imagen_basilica' => 'img/sanGonzalo/parroquia.png',
            'imagen_cristo' => 'img/sanGonzalo/sanGonzalo.png',
            'imagen_virgen' => 'img/sanGonzalo/palioSalud.png',
            
            // Descripción corta para la tarjeta del listado
            'descripcion' => 'La Hermandad de San Gonzalo fue fundada por jóvenes cofrades en el año 1942 en la parroquia de San Gonzalo, sita en el histórico arrabal de Triana (Sevilla).',
            
            // Historia larga para la página de detalle
            'historia' => 'En el año 1942 se consagra en Triana una nueva parroquia, la iglesia parroquial de San Gonzalo, para dar respuesta a las necesidades del crecimiento del barrio. En ese mismo año los feligreses parroquiales y un grupo jóvenes cofrades deciden crear dos hermandades: una Sacramental, para rendir culto al Santo Sacramento de la Eucaristía, y otra Penitencial, respectivamente. Estas dos hermandades acuerdan su fusión en 1953. La hermandad penitencial hizo su primera estación de penitencia en 1948.
                            La cofradía está agregada a la basílica del Santo Sepulcro de Jerusalén, gozando de sus mismas gracias y privilegios.
                            El Rey emérito Juan Carlos I es hermano mayor honorario de la cofradía desde el año 1976. En 1977, un aparatoso incendio en la parroquia de San Gonzalo afectó a diversos enseres de la cofradía, afortunadamente sin lamentar la pérdida de las imágenes titulares, aunque tuvieron que ser intervenidas por la acción indirecta del fuego. Posteriormente en 1987 la hermandad incorporó como titular a San Juan Evangelista.
                            En su historia reciente destacar la Coronación Canónica de Nuestra Señora de la Salud el 14 de octubre de 2017 en la Santa y Metropolitana Iglesia Catedral de Sevilla.',
            
            'musica' => 'Delante de la cruz de guía, la banda Sagrada Columna y Azotes de las Cigarreras. Tras el paso del misterio, Cigarreras. Tras el palio, Banda de Santa Ana de Dos Hermanas',
            
            'info_cristo' => 'La actual imagen de Jesús en su Soberano Poder ante Caifás es de talla completa, ejecutada por el imaginero Luis Ortega Bru, como sustitución a una anterior imagen de Antonio Castillo Lastrucci que presentaba serios problemas de conservación.
                               El paso de misterio de la cofradía de San Gonzalo representa a Jesús ante el sumo sacerdote Caifás. Un soldado romano sostiene una soga que maniata a Jesús, mientras que un esclavo negro sostiene un libro con las leyes judías. ',
            
            'info_virgen' => 'En el segundo paso figura la imagen de María Santísima, bajo la advocación de Nuestra Señora de la Salud. La primigenia talla fue realizada por Rafael Lafarque en los años 40 del siglo XX, siendo sometida a diversas remodelaciones en su historia material.
                               Desde su llegada la Virgen de la Salud ha sido eslabón y referente de devoción en el Barrio León y en su Hermandad. Entre muchos, dos principales hitos avalan el fervor que despierta esta Dolorosa en el barrio de Triana.
                               La Virgen de la Salud posee varias condecoraciones civiles y militares, de las que destaca la medalla de la ciudad de Sevilla, copia de la concedida al Consejo de Hermandades y Cofradías e impuesta por el Ayuntamiento, y dos fajines militares de gala: de teniente general, donado por José Carlos Varas Criado, y de capitán general, donado por el teniente general jefe de la Fuerza Terrestre del Ejército de Tierra, Juan Gómez de Salazar Minguez.',
        ]);



        \App\Models\Hermandad::create([
            'nombre' => 'La Amargura',
            'sede' => 'Iglesia de San Juan de la Palma',
            'fundacion' => '1696',
            'slug' => 'la-amargura',
            'dia_salida' => 'Domingo de Ramos',
            'imagen_tarjeta' => 'img/amargura.png',
            'imagen_basilica' => 'img/amargura/iglesiaAmargura.png',
            'imagen_cristo' => 'img/amargura/cristoAmargura.jpg',
            'imagen_virgen' => 'img/amargura/palioAmargura.jpg',
            
            // Descripción corta para la tarjeta del listado
            'descripcion' => 'Conocida como el Silencio Blanco, es una de las cofradías más elegantes y clásicas del Domingo de Ramos sevillano.',
            
            // Historia larga para la página de detalle
            'historia' => 'Fundada en 1699 en la parroquia de San Julián. En 1724 se traslada a San Juan de la Palma. Es la primera hermandad sevillana en ser coronada canónicamente (1954).
                            Cambia de parroquia en 1724 trasladándose a la iglesia de San Juan de la Palma. En 1893 se incendió el paso de palio, pero se pudieron salvar las imágenes, que fueron restauradas por Antonio Susillo.
                            En 1954 el papa Pío XII concede la coronación canónica a la Virgen, siendo la primera Dolorosa con esta distinción.
                            En 2004 celebra el 450 aniversario de la fundación de la Hermandad Sacramental de San Juan de la Palma, el centenario de la fusión con la hermandad de penitencia y el 50 aniversario de la coronación canónica de la Virgen de la Amargura.',
            
            'musica' => 'Banda de Cornetas y Tambores de las Tres Caídas de Triana en el misterio. Sociedad Filarmónica Nuestra Señora del Carmen de Salteras en el palio.',
            
            'info_cristo' => 'Tanto el Señor del Silencio en el desprecio de Herodes como el Señor atado a la columna de la localidad de La Orotava, en Tenerife, realizado en 1689, y el Nazareno de Santa Isabel de Écija, realizado entre 1699 y 1701, son obra de un discípulo de Pedro Roldán. En el paso en el que procesiona se encuentran también tres soldados romanos, el rey Herodes Antipas y dos hebreos, obras todos ellos de Manuel Gabella según el proyecto de Cayetano González Gómez y realizadas entre 1937 y 1938. En 1940 el mismo escultor añadiría un nuevo hebreo.
                                El paso de Cristo es de estilo rocalla, dorado e iluminado con candelabros de guardabrisas. La imagen de Jesús del Silencio lleva potencias en oro de ley.',
            
            'info_virgen' => 'La dolorosa es obra del taller de Pedro Roldán y va acompañada por la imagen de San Juan obra de Benito de Hita y Castillo. El paso de palio tiene orfebrería en plata de ley. El palio y el manto son de terciopelo granate bordados en oro. La Virgen lleva corona en oro de ley y una imagen de la Virgen de los Reyes, de plata. La orfebrería de este palio es muy meritoria, contando con obras de Seco Velasco y Cayetano González. Además, los bordados de Juan Manuel Rodríguez Ojeda aumentan su calidad artística.',
        ]);

        

        \App\Models\Hermandad::create([
            'nombre' => 'Los Estudiantes',
            'sede' => 'Capilla del Rectorado de la Universidad Hispalense',
            'fundacion' => '1924',
            'slug' => 'los-estudiantes',
            'dia_salida' => 'Martes Santo',
            'imagen_tarjeta' => 'img/LosEstudiantes.jpg',
            'imagen_basilica' => 'img/losEstudiantes/capilla.png',
            'imagen_cristo' => 'img/losEstudiantes/cristo.jpg',
            'imagen_virgen' => 'img/losEstudiantes/virgenAngustias.png',
            
            // Descripción corta para la tarjeta del listado
            'descripcion' => 'La Hermandad de los Estudiantes es una cofradía católica instaurada en la ciudad de Sevilla, Andalucía, España.',
            
        
            // Historia larga para la página de detalle
            'historia' => 'La hermandad fue fundada por un grupo de profesores y alumnos de la Universidad de Sevilla el 17 de noviembre de 1924, siendo su primer Hermano Mayor D. Feliciano Candau y Pizarro.
                            Su sede canónica fue instaurada en la iglesia que la universidad tenía en la calle Laraña, la iglesia de la Anunciación, y realizó su primera estación de penitencia en la Semana Santa de 1926 únicamente con el paso de Cristo.
                            En el año 1999 celebró el 75 aniversario de su fundación, dentro del cual llevó a cabo un hermanamiento con la Hermandad de la Esperanza Macarena. Además, se bendijo el nuevo altar de la Virgen, obra de Manuel Guzmán Bejarano.',
            
            'musica' => 'El paso de Cristo no lleva. Banda Ntra. Sra. del Águila de Alcalá de Guadaíra tras el paso de palio de la Angustia.',
            
            'info_cristo' => 'El crucificado, Cristo de la Buena Muerte, fue realizado por Juan de Mesa en 1620, para la casa profesa de los jesuitas, que se encontraba en la que luego sería la sede de la universidad.
                                Fue restaurado en 1983, 1986 y 1994. El paso es de estilo neorrenacentista, realizado en madera de caoba en 1926, y está iluminado por cuatro hachones de color tiniebla. Este paso no lleva acompañamiento musical.',
            
            'info_virgen' => 'El segundo paso alberga a María Santísima de la Angustia bajo palio. La imagen está atribuida a Juan de Astorga en 1817, y perteneció a la extinta Hermandad del Despedimiento de Nuestro Señor Jesucristo, de su Santísima Madre, Santo Cristo de las Virtudes y Dulce Nombre de María, donde se rendía culto bajo la advocación del Dulce Nombre de María. El paso de palio tiene orfebrería en plata de ley, la candelería está realizada en alpaca y la crestería en plata. El techo y las bambalinas son de terciopelo granate, y llevan bordados realizados entre 1949 y 1958 por Esperanza Elena Caro.
                                Fue restaurada en 1985. En 2005 estrenó un manto bordado en oro, y en 2008 el faldón delantero del paso. La Virgen lleva corona en plata dorada. El palio es acompañado en su estación de penitencia por la banda de música de Nuestra Señora del Águila, de Alcalá de Guadaíra.',
        ]);
        
    }
}
