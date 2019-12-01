# CookingBook B.V.

## Inleiding

Hallo, mijn naam is Youness Arsalane. Ik zit in klas 22INF2A en deze website heb ik ontwikkeld voor mijn propedeuse assessment. Deze website is gebouwd op het PHP Framework `Laravel` in de versie 6.0.

In de map `docs` vind je het Ontwerpdocument voor dit project. In deze map vind je ook de MySQL database _cooking_book.sql_ die je moet importeren voor gebruiken van de website.

Ik heb dit project ook een GitHub repository bijgehouden met de versie beheer en aanpassingen van de website; deze kun je [hier](https://github.com/youness-arsalane/cooking_book) bekijken.



## Installatie

Om deze website lokaal te draaien op bijvoorbeeld een XAMPP Webserver, moet je eerst de database importeren die in `docs` staat. Daarna moet je in het `.env` bestand je database gegevens invullen op regel 9 t/m 14.


Wat ook moet gebeuren is het installeren van Composer op je computer. Op [deze](https://getcomposer.org/download) link kun je de stappen volgen om Composer installeren.

Zodra dit gedaan is moet je in de map van het project Command Prompt open en het volgende typen:

    composer install

Als dit voltooid is kun je het volgende typen in je Command Prompt.

    php artisan serve

Nu wordt de website lokaal gedraaid op je computer op [http://127.0.0.1:8000](http://127.0.0.1:8000) en kun je de website bekijken en gebruiken.

In de database _cooking_book.sql_ staat al één gebruiker in. Deze gegevens wordt gebruikt voor de het inloggen in het CMS. Het wachtwoord staat versleuteld met `bcrypt` in de database. Dit zijn de inloggegevens:

<ul>
<li>E-mailadres:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;pietjepuk@gmail.com</li>
<li>Wachtwoord:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;test</li>
</ul>

In het CMS kun je nu recepten, ingrediënten en nieuwsberichten aanmaken, aanpassen en verwijderen. Ook kun je ze aan elkaar koppelen en kun je afbeeldingen toevoegen en verwijderen.
