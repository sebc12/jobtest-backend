## Jobtest som Backendudvikler hos Side-Walk
Først vil jeg sige tak, fordi du vil deltage i vores rekruterings process. Du har nu forket vores git repo, og skal i gang med testen.

### Tidsforbrug
Du må maks bruge 3,5 time på løsning af testen.

### Aflevering af test
Du skal fremsende et link til din public fork, hvor din opgaveløsning ligger på senest d. 22/6-25.

### Regler
Der må ikke bruges chatGPT eller anden AI til besvarelse og løsning af opgaven!!

## Opsætning af testmiljø
Vi har sat projektet i docker så det første du skal gøre:
kopier .env.docker.exemple til .env

sæt http://jobtest.test ind i din hosts fil, så du kan fange applikationen.

Kørfølgende kommendoer:
- docker compose up
log derefter ind i php containeren (docker exec -it jobtest_php bash) og kør
- composer install
- npm install
- npm run dev
log derefer ind i en ny termianl i php contaioneren
php artisan migrate
php artisan db:seed
log derefter ind i php containeren (docker exec -it jobtest_php bash) og kør
chmod -R 777 storage/

browserurl:http://jobtest.test/

herefter kan du logge ind med brugeren
brugernavn: test@test.test
kode: Test123

Ønsker du at bruge andet end docker f.eks Laravel Herd eller andet dev miljø er du velkommen til at sætte dette op inden testen begynder.


 ## Test/Opgave
 De 4 opgaver du skal løse er beskrevet nedenfor, og rækkefølgende er op til dig.

1) Der skal sættes relationer op mellem: 

- User hasmany Project
- Project hasmany Comment

2) Optimer projectcontrolleren

3) Der er lagt to fejl ind som er relateret til hinanden, denne skal findes og rettes.

4) Besvar spørgsmålene i denne README FIL, under hver spørgsmål.

``` Spørgsmål 1 ```

``` Relation morph ```

*Indsæt svar 1*
En morph relation gør det muligt for en model at relatere til flere forskellige modeller gennem en fælles relation. I stedet for at skulle håndtere flere forskellige foreign keys, forenkler morph relationen strukturen og gør det lettere at opretholde fleksible relationer mellem modeller. 

For eksempel, hvis vi i denne opgave har både 'tasks' tilknyttet 'projects', og der både kan være kommentarer til 'projects' og til 'tasks', kan man med fordel bruge en polymorf relation. På den måde kan kommentarerne gemmes i én fælles tabel med felter for id, type og kommentar, som peger på enten et projekt eller en opgave.

``` Spørgsmål 2 ```

``` Du har en database med mange relationer hvor company er den model hvor alle relationer til et given virksomhed har relationer til. Hvordan sikre du dig, at data slettes i relationsmodellerne, når du sletter en givent virksomhed? ```

*Indsæt Svar 2*
Vi kan sikre os, at data i relaterede modeller slettes ved at bruge "onDelete('cascade')" i vores migrationsfiler. Når vi opretter en foreign key i en migration der referer til 'company', så tilføjer vi "onDelete('cascade')".

``` Spørgsmål 3```

``` Når du skal lave funktionskode, f.eks. du behandler model data inden du skal sende det til et view, hvor placere du funktionskoden? ```

*Indsæt Svar 3*
Man kan placere funktionskoden i en controller, hvor vi f.eks. kan lave pagination, sortering eller filtrering.
Hvis man ønsker at holde controlleren mere overskuelig og adskille logik fra præsentation, kan man i stedet bruge en ViewModel. En ViewModel kan bruges til at lave data klart til præsentation.


``` Spørgsmål 4 ```

``` Du sidder og skal arbejde for en kunde, hvis applikation køre uden PHP framework. Du skal lave et input felt og gemme det i databasen. Hvilke overvejelser gør du?  ```

*Indsæt Svar 4*
Når man arbejder uden et PHP-framework som f.eks. Laravel, har man ikke adgang til de sikkerhedsmekanismer, som et framework normalt stiller til rådighed. Derfor vil jeg have særligt fokus på sikkerhed og korrekt håndtering af data.

For eksempel vil jeg sørge for, at alt input bliver valideret og saniteret, så det kun indeholder gyldige værdier, og skadelig kode fjernes.
Når data skal vises i et view, sørger jeg for at escape outputtet, så der ikke kan afvikles skadelig HTML eller JavaScript (XSS-angreb).

Kort sagt vil jeg sikre, at alle relevante sikkerhedsforanstaltninger er på plads, så applikationen er robust og beskyttet mod angreb.

## Efter testen
Vi reviewer din løsning i ugen efter d. 22/6-25, hvorefter du vil få feedback på testudførslen. 
Herefter vil du enten få et begrundet afslag eller blive indkaldt til samtale, som er sidste forløb i rekrutteringsprocessen. 
