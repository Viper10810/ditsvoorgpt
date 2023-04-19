<?php

class database{

    private $host;
    private $dbh;
    private $user;
    private $pass;
    private $db;

    public function __construct(){
        $this->host = 'localhost';
        $this->user = 'root';
        $this->pass = '';
        $this->db = 'toernooi';
       
        
        try{
            $dsn = "mysql:host=$this->host;dbname=$this->db";
            $this->dbh = new PDO($dsn, $this->user, $this->pass);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->dbh;
        }
        catch(\PDOException $e){
            echo "Connection Failed: ".$e->getMessage();
        }
    
    }

//alle spelers functies

    public function getSpelers(){
        try {
            $query = $this->dbh->query(
                "SELECT spelers.spelerID, spelers.voornaam, spelers.tussenvoegsel, spelers.achternaam, scholen.naam AS schoolnaam
                FROM spelers INNER JOIN scholen ON spelers.schoolID = scholen.schoolID;
        ");

            return $query->fetchAll();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

   
    public function getSchool(){
        try {
            $query = $this->dbh->query(
                "SELECT * FROM scholen");

            return $query->fetchAll();
        } catch (\PDOException $e) {
            throw $e;
        }
    }
   
    public function getSchoolID($id){
        try {
            $query = $this->dbh->prepare("SELECT * FROM scholen WHERE schoolID = :id");

            $query->execute([
                'id' => $id
            ]);

            return $query->fetch(PDO::FETCH_ASSOC);

        } catch (\PDOException $e) {
            throw $e;
        }
    }

    
    public function createSpelers($voornaam, $tussenvoegsel, $achternaam, $schoolID){
        try {
            $query =$this->dbh->prepare(
                "INSERT INTO spelers (voornaam, tussenvoegsel, achternaam, schoolID)
                 VALUES(:voornaam, :tussenvoegsel, :achternaam, :schoolID);"
                 );

            $query->execute([
                'voornaam' => $voornaam,
                'tussenvoegsel' => $tussenvoegsel,
                'achternaam' => $achternaam,
                'schoolID' => $schoolID
            ]);

            header("Location: ../index.php");

        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function getSpelerID($id){
        try {
            $query = $this->dbh->prepare("SELECT spelers.spelerID, spelers.voornaam, spelers.tussenvoegsel, spelers.achternaam, scholen.naam AS schoolnaam
            FROM spelers INNER JOIN scholen ON spelers.schoolID = scholen.schoolID WHERE spelerID = :id");

            $query->execute([
                'id' => $id
            ]);

            return $query->fetch(PDO::FETCH_ASSOC);

        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function deleteSpeler($id){
        try {
            $query = $this->dbh->prepare(
                "DELETE FROM spelers
                WHERE spelerID = :id;"
            );

            $query->execute([
                'id' => $id
            ]);

            header("Location: ../index.php");
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function editSpeler($voornaam, $tussenvoegsel, $achternaam, $schoolID, $id){
        try {
            $query = $this->dbh->prepare(
                "UPDATE spelers 
                SET 
                voornaam = :voornaam, 
                tussenvoegsel = :tussenvoegsel,
                achternaam = :achternaam,
                schoolID = :schoolID
                    WHERE spelerID = :id 
                        ;"
            ); 
                
            $query->execute([
                'voornaam' => $voornaam,
                'tussenvoegsel' => $tussenvoegsel,
                'achternaam' => $achternaam,
                'schoolID' => $schoolID,
                'id' => $id
            ]);

            header("Location: ../index.php");

            exit;
        } catch (\PDOException $e) {
            throw $e;
        }
    }
    
 //alle school functies

    public function createSchool($naam){
        try {
            $query =$this->dbh->prepare(
                "INSERT INTO scholen (naam)
                 VALUES(:naam);"
                 );

            $query->execute([
                'naam' => $naam
            ]);

            header("Location: ../school.php");

        } catch (\PDOException $e) {
            throw $e;
        }
    }
    
    public function editSchool( $naam, $schoolID){
        try {
            $query = $this->dbh->prepare(
                "UPDATE scholen 
                SET 
                naam = :naam 
                    WHERE schoolID = :schoolID 
                        ;"
            ); 
                
            $query->execute([
                'schoolID' => $schoolID,
                'naam' => $naam
            ]);

            header("Location: ../school.php");

            exit;
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function deleteSchool($id){
        try {
            $query = $this->dbh->prepare(
                "DELETE FROM scholen
                WHERE schoolID = :id;"
            );

            $query->execute([
                'id' => $id
            ]);

            header("Location: ../school.php");
        } catch (\PDOException $e) {
            throw $e;
        }
    }

//alle toernooi functies

    public function getToernooi(){
        try {
            $query = $this->dbh->query(
                "SELECT * FROM toernooien");

            return $query->fetchAll();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function getToernooiID($id){
        try {
            $query = $this->dbh->prepare("SELECT * FROM toernooien WHERE toernooiID = :id");

            $query->execute([
                'id' => $id
            ]);

            return $query->fetch(PDO::FETCH_ASSOC);

        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function createToernooi($omschrijving, $datum){
        try {
            $query =$this->dbh->prepare(
                "INSERT INTO toernooien (omschrijving, datum)
                 VALUES(:omschrijving, :datum);"
                 );

            $query->execute([
                'omschrijving' => $omschrijving,
                'datum' => $datum
            ]);

            header("Location: ../toernooi.php");

        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function editToernooi($omschrijving, $datum ,$toernooiID){
        try {
            $query = $this->dbh->prepare(
                "UPDATE toernooien 
                SET 
                omschrijving = :omschrijving,
                datum = :datum
                    WHERE toernooiID = :toernooiID 
                        ;"
            ); 
                
            $query->execute([
                'toernooiID' => $toernooiID,
                'omschrijving' => $omschrijving,
                'datum' => $datum,
            ]);

            header("Location: ../toernooi.php");

            exit;
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function deleteToernooi($id){
        try {
            $query = $this->dbh->prepare(
                "DELETE FROM toernooien
                WHERE toernooiID = :id;"
            );

            $query->execute([
                'id' => $id
            ]);

            header("Location: ../toernooi.php");
        } catch (\PDOException $e) {
            throw $e;
        }
    }

//alle wedstrijd functies

    public function getWedstrijd($id){
        try {
            $query = $this->dbh->prepare(
                "SELECT *, sp1.voornaam AS speler1, sp2.voornaam as speler2, spwin.voornaam AS winnaar
                    FROM wedstrijd
                        INNER JOIN toernooien ON toernooien.toernooiID = wedstrijd.toernooiID
                        INNER JOIN spelers sp1 ON sp1.spelerID = wedstrijd.speler1ID 
                        INNER JOIN spelers sp2 ON sp2.spelerID = wedstrijd.speler2ID
                        INNER JOIN spelers spwin ON spwin.spelerID =  wedstrijd.winnaarsID
                        WHERE wedstrijd.toernooiID = :id;");

                $query->execute([
                    'id' => $id
                ]);

            return $query->fetchAll();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function getwedstrijdID($id){
        try {
            $query = $this->dbh->prepare(
                "SELECT *, sp1.voornaam AS speler1, sp2.voornaam as speler2, spwin.voornaam AS winnaar
                    FROM wedstrijd
                        INNER JOIN toernooien ON toernooien.toernooiID = wedstrijd.toernooiID
                        INNER JOIN spelers sp1 ON sp1.spelerID = wedstrijd.speler1ID 
                        INNER JOIN spelers sp2 ON sp2.spelerID = wedstrijd.speler2ID
                        INNER JOIN spelers spwin ON spwin.spelerID =  wedstrijd.winnaarsID
                            WHERE wedstrijdsID = :id;");

            $query->execute([
                'id' => $id
            ]);

            return $query->fetchAll();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function createWedstrijd($toernooiID, $ronde, $speler1, $speler2, $score1, $score2, $winnaarsID){
        try {
            $query =$this->dbh->prepare(
                "INSERT INTO wedstrijd (toernooiID, ronde, speler1ID, speler2ID, score1, score2, winnaarsID)
                 VALUES(:toernooiID, :ronde, :speler1, :speler2, :score1, :score2, :winnaar);"
                 );

            $query->execute([
                'toernooiID' => $toernooiID,
                'ronde' => $ronde,
                'speler1' => $speler1,
                'speler2' => $speler2,
                'score1' => $score1,
                'score2' => $score2,
                'winnaar' => $winnaarsID
            ]);

            header("Location: ../toernooi.php");

        } catch (\PDOException $e) {
            throw $e;
        }
    }



    public function deleteWedstrijd($id){
        try {
            $query = $this->dbh->prepare(
                "DELETE FROM wedstrijd
                WHERE wedstrijdsID = :id;"
            );

            $query->execute([
                'id' => $id
            ]);

            header("Location: wedstrijd.php");
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function editWedstrijd($id, $toernooiID, $ronde, $speler1ID, $speler2ID, $score1, $score2, $winnaarsID ){
        try {
            $query = $this->dbh->prepare(
                "UPDATE wedstrijd  INNER JOIN spelers ON wedstrijd.winnaarsID = spelers.spelerID
                SET
                toernooiID = :toernooiID, 
                ronde = :ronde, 
                speler1ID = :speler1ID, 
                speler2ID = :speler2ID, 
                score1 = :score1, 
                score2 = :score2, 
                winnaarsID = :winnaarsID 
               
                WHERE wedstrijdsID = :wedstrijdsID;"
            ); 
                
            $query->execute([
                'wedstrijdsID' => $id,
                'toernooiID' => $toernooiID,
                'ronde' => $ronde,
                'speler1ID' => $speler1ID,
                'speler2ID' => $speler2ID,
                'score1' => $score1,
                'score2' => $score2,
                'winnaarsID' => $winnaarsID
                
            ]);

            header("Location: wedstrijd.php");

            exit;
        } catch (\PDOException $e) {
            throw $e;
        }
    }

//alle aanmelding functies

public function getAanmelding($id){
    try {
        $query = $this->dbh->prepare(
            "SELECT *, aanmelding.aanmeldingsID, spelers.spelerID, spelers.voornaam, spelers.tussenvoegsel, spelers.achternaam, toernooien.toernooiID, toernooien.omschrijving, toernooien.datum
                FROM aanmelding 
                    INNER JOIN spelers ON spelers.spelerID = aanmelding.spelerID 
                    INNER JOIN scholen ON spelers.schoolID = scholen.schoolID
                    INNER JOIN toernooien ON toernooien.toernooiID = aanmelding.toernooiID
                    WHERE aanmelding.toernooiID = :id;");

                $query->execute([
                    'id' => $id
                ]);

        return $query->fetchAll();
    } catch (\PDOException $e) {
        throw $e;
    }
}

public function getAanmeldingsID($id){
    try {
        $query = $this->dbh->prepare(
            "SELECT aanmelding.aanmeldingsID, spelers.spelerID, spelers.voornaam, spelers.tussenvoegsel, spelers.achternaam, toernooien.toernooiID, toernooien.omschrijving, toernooien.datum
                FROM aanmelding 
                    INNER JOIN spelers ON spelers.spelerID = aanmelding.spelerID 
                    INNER JOIN toernooien ON toernooien.toernooiID = aanmelding.toernooiID 
                        WHERE aanmeldingsID = :id;");

        $query->execute([
            'id' => $id
        ]);

        return $query->fetchAll();
    } catch (\PDOException $e) {
        throw $e;
    }
}

public function createAanmelding($spelerID, $toernooiID){
    try {
        $query =$this->dbh->prepare(
            "INSERT INTO aanmelding (spelerID, toernooiID)
             VALUES(:spelerID, :toernooiID);"
             );

        $query->execute([
            'spelerID' => $spelerID,
            'toernooiID' => $toernooiID
        ]);

        header("Location: ../toernooi.php");

    } catch (\PDOException $e) {
        throw $e;
    }
}

public function editAanmelding($aanmeldingsID, $spelerID, $toernooiID){
    try {
        $query = $this->dbh->prepare(
            "UPDATE aanmelding
            SET
            spelerID = :spelerID,
            toernooiID = :toernooiID
            WHERE aanmeldingsID = :aanmeldingsID;"
        ); 
            
        $query->execute([
            'aanmeldingsID' => $aanmeldingsID,
            'spelerID' => $spelerID,
            'toernooiID' => $toernooiID
        ]);

        header("Location: ../aanmelding.php");

        exit;
    } catch (\PDOException $e) {
        throw $e;
    }
}

public function deleteAanmelding($id){
    try {
        $query = $this->dbh->prepare(
            "DELETE FROM aanmelding
            WHERE aanmeldingsID = :id;"
        );

        $query->execute([
            'id' => $id
        ]);

        header("Location: ../aanmelding.php");
    } catch (\PDOException $e) {
        throw $e;
    }
}

public function getUitslag($id){
    try {
        $query = $this->dbh->prepare(
            "SELECT *, sp1.voornaam AS speler1, sp2.voornaam as speler2, spwin.voornaam AS winnaar
            FROM wedstrijd
                INNER JOIN toernooien ON toernooien.toernooiID = wedstrijd.toernooiID
                INNER JOIN spelers sp1 ON sp1.spelerID = wedstrijd.speler1ID 
                INNER JOIN spelers sp2 ON sp2.spelerID = wedstrijd.speler2ID
                INNER JOIN spelers spwin ON spwin.spelerID =  wedstrijd.winnaarsID
                    WHERE wedstrijd.toernooiID = :id AND wedstrijd.ronde = 1;");

        $query->execute([
            'id' => $id
        ]);

        return $query->fetchAll();
    } catch (\PDOException $e) {
        throw $e;
    }

}

public function getUitslagTwee($id){
    try {
        $query = $this->dbh->prepare(
            "SELECT *, sp1.voornaam AS speler1, sp2.voornaam as speler2, spwin.voornaam AS winnaar
            FROM wedstrijd
                INNER JOIN toernooien ON toernooien.toernooiID = wedstrijd.toernooiID
                INNER JOIN spelers sp1 ON sp1.spelerID = wedstrijd.speler1ID 
                INNER JOIN spelers sp2 ON sp2.spelerID = wedstrijd.speler2ID
                INNER JOIN spelers spwin ON spwin.spelerID =  wedstrijd.winnaarsID
                    WHERE wedstrijd.toernooiID = :id AND wedstrijd.ronde = 2;");

        $query->execute([
            'id' => $id
        ]);

        return $query->fetchAll();
    } catch (\PDOException $e) {
        throw $e;
    }

}

public function getAlleAanmeldingen($id){
    try{
    $query = $this->dbh->prepare( "SELECT *, count(*) AS aantal FROM aanmelding JOIN spelers ON aanmelding.spelerID = spelers.spelerID
            JOIN toernooien ON aanmelding.toernooiID = toernooien.toernooiID GROUP BY aanmelding.toernooiID");

$query->execute([
    'id' => $id
]);

    return $query->fetchAll();
    } catch (\PDOException $e) {
        throw $e;
    }
}



}


