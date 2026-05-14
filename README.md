# Kockanje

Preprosta PHP spletna igra za metanje kock, narejena v slovenščini. V igri sodelujejo trije igralci, uporabnik pa izbere število iger in število kock. Program nato izvede mete, sešteva rezultate in na koncu prikaže končno razvrstitev.

## Opis projekta

Projekt omogoča:

- vnos imen treh igralcev,
- izbiro števila iger od 1 do 5,
- izbiro števila kock od 1 do 3,
- metanje kock za vsakega igralca,
- prikaz rezultata posameznega meta,
- sprotno seštevanje točk,
- prikaz zmagovalca in končne lestvice,
- samodejno vrnitev na začetno stran po prikazu rezultatov.

## Uporabljene tehnologije

- HTML
- CSS
- PHP
- JavaScript
- SweetAlert2

## Struktura projekta

```text
projekt/
├── index.php
├── meti.php
├── rezultati.php
└── css/
    ├── styleI.css
    ├── styleM.css
    └── styleR.css
```

## Datoteke

### `index.php`

Začetna stran igre. Vsebuje obrazec, kjer uporabnik vnese imena treh igralcev, izbere število iger in število kock ter začne igro.

### `meti.php`

Glavni del igre. Skrbi za metanje kock, prikaz animiranih kock, izračun vsote posameznega meta in shranjevanje skupnih rezultatov v sejo.

### `rezultati.php`

Stran za prikaz končnih rezultatov. Rezultate razvrsti po številu točk, prikaže zmagovalca, drugo in tretje mesto ter po 15 sekundah uporabnika vrne na začetno stran.

### `styleI.css`

Oblikovanje začetne strani.

### `styleM.css`

Oblikovanje strani z meti kock.

### `styleR.css`

Oblikovanje strani z rezultati.

## Kako zagnati projekt

1. Projektno mapo postavi v mapo lokalnega strežnika, na primer:

```text
htdocs/kockanje
```

2. Prepričaj se, da so CSS datoteke v mapi `css`.

3. Zaženi lokalni strežnik, na primer XAMPP ali Laragon.

4. V brskalniku odpri:

```text
http://localhost/kockanje/index.php
```

## Potek igre

1. Igralci vpišejo svoja imena.
2. Izbere se število iger.
3. Izbere se število kock.
4. Klikne se gumb **Igraj**.
5. Program prikaže mete za vsakega igralca.
6. Če je več iger, se naslednji met izvede z gumbom **Vrži**.
7. Po zadnjem metu se klikne **Rezultati**.
8. Prikaže se končna lestvica.

## Avtor

Jakob Ferfolja
