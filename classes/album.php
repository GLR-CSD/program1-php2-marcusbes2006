<?php

class Album
{
    /** @var int|null Het ID van het album */
    private ?int $ID;

    /** @var string De naam van het album */
    private string $Naam;

    /** @var string De releasedatum van het album */
    private string $Releasae_datum;

    /** @var string|null De URL van het album */
    private ?string $URL;

    /** @var string|null De afbeelding van het album */
    private ?string $afbeelding;

    /** @var string|null De prijs van het album */
    private ?string $prijs;

    /** @var string|null De artiest van het album */
    private ?string $artiest;

    /**
     * @param int|null $ID
     * @param string $Naam
     * @param string $Releasae_datum
     * @param string|null $URL
     * @param string|null $afbeelding
     * @param string|null $prijs
     * @param string|null $artiest
     */
    public function __construct(?int $ID, string $Naam, string $Releasae_datum, ?string $URL, ?string $afbeelding, ?string $prijs, ?string $artiest)
    {
        $this->ID = $ID;
        $this->Naam = $Naam;
        $this->Releasae_datum = $Releasae_datum;
        $this->URL = $URL;
        $this->afbeelding = $afbeelding;
        $this->prijs = $prijs;
        $this->artiest = $artiest;
    }

    /**
     * @return int|null
     */
    public function getID(): ?int
    {
        return $this->ID;
    }

    /**
     * @param int|null $ID
     */
    public function setID(?int $ID): void
    {
        $this->ID = $ID;
    }

    /**
     * @return string
     */
    public function getNaam(): string
    {
        return $this->Naam;
    }

    /**
     * @param string $Naam
     */
    public function setNaam(string $Naam): void
    {
        $this->Naam = $Naam;
    }

    /**
     * @return string
     */
    public function getReleasaeDatum(): string
    {
        return $this->Releasae_datum;
    }

    /**
     * @param string $Releasae_datum
     */
    public function setReleasaeDatum(string $Releasae_datum): void
    {
        $this->Releasae_datum = $Releasae_datum;
    }

    /**
     * @return string|null
     */
    public function getURL(): ?string
    {
        return $this->URL;
    }

    /**
     * @param string|null $URL
     */
    public function setURL(?string $URL): void
    {
        $this->URL = $URL;
    }

    /**
     * @return string|null
     */
    public function getAfbeelding(): ?string
    {
        return $this->afbeelding;
    }

    /**
     * @param string|null $afbeelding
     */
    public function setAfbeelding(?string $afbeelding): void
    {
        $this->afbeelding = $afbeelding;
    }

    /**
     * @return string|null
     */
    public function getPrijs(): ?string
    {
        return $this->prijs;
    }

    /**
     * @param string|null $prijs
     */
    public function setPrijs(?string $prijs): void
    {
        $this->prijs = $prijs;
    }

    /**
     * @return string|null
     */
    public function getArtiest(): ?string
    {
        return $this->artiest;
    }

    /**
     * @param string|null $artiest
     */
    public function setArtiest(?string $artiest): void
    {
        $this->artiest = $artiest;
    }

    public static function getAll(PDO $db): array
    {
        // Voorbereiden van de query
        $stmt = $db->query("SELECT * FROM album");

        // Array om albums op te slaan
        $albums = [];

        // Itereren over de resultaten en albums toevoegen aan de array
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $album = new Album(
                $row['ID'],
                $row['Naam'],
                $row['Releasae_datum'],
                $row['URL'],
                $row['afbeelding'],
                $row['prijs'],
                $row['artiest']
            );
            $albums[] = $album;
        }
        return $albums;
    }
}
