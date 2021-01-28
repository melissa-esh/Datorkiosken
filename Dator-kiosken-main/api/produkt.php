<?php
header("Content-Type: application/json;"); //se till att vårt svar hanteras som json
class Product {
    //skapa upp våra variabler så vi kan lättare använda när vi skapar
    public $namn;
    public $pris;
    public $bild;
    public $beskrivning;
    public $lagerAntal;

    //en konstruktor till vårt objekt så vi kan spara ner lättare det generade
    public function Product($namn, $bild,$beskrivning,$pris,$lagerAntal){
        $this->namn = $namn;
        $this->pris = $pris;
        $this->bild = $bild;
        $this->beskrivning = $beskrivning;
        $this->lagerAntal = $lagerAntal;
    }

}

$namn = array(
    "Mobil",  // 0
    "Ipad", 
    "Dator Chassi ", 
    "Tangentbord", 
    "Mus", 
    "Hörlurar", 
    "Skrivare", 
    "Skärm", 
    "Macbook", 
    "Portabel Hårddisk"      // 9
);
// 2.2 Lagra 10 pris 
$pris = array(
    7999,
    3479,
    871,
    699,
    449,
    799,
    1999,
    1590,
    12788,
    599,
);
$bilder = array(
    "/img/1.jpg",
    "/img/2.jpg",
    "/img/3.jpg",
    "/img/4.jpg",
    "/img/5.jpg",
    "/img/6.jpg",
    "/img/7.jpg",
    "/img/8.jpg",
    "/img/9.jpg",
    "/img/10.jpg",
);

$beskrivning = array(
"Apple iPhone 8 64GB" .
"Då telefonens hölje är vatten- och dammtåligt (IP 67) så klarar den lite hårdare tag. Ta bilder med dubbla kameror i upp till 12 Mp upplösning och filma i hela 2160p (4K). Denna Apple smartphone bjuder på 1821 mAh batterikapacitet. ",
"iPad (2018) 32 GB WiFi (rymdgrå)",
"PC-Case Thermaltake View 21 TG Midi Tower black retail",
"Razer Cynosa Chroma tangentbord gaming",
"Logitech M705 " .
"Laser 1000dpi Mus Silver " .
"Imponerande batteritid på 3 år ",
"Logitech Wireless Headset H600 " .
"Frigör dig från datorn med trådlöst ljud för dina samtal och din musik.",
"HP Color Laserjet Pro M254nw
Öka effektiviteten med snabba färgutskrifter",
"Samsung C24F390FH
23.5' 1920 x 1080 16:9 AMD FreeSync
Vacker välvd 24-tummare med snabb VA-panel och FreeSync",
"MacBook Pro 13 tum     wagd xgv MPXR2 (silver)",
"WD Elements Portable" . 
"0.5TB Svart" . 
"Enkel, snabb och bärbar",
);

//antal att generera , kan ändras till vad som helst egentligen
$generateNumber = 9;


//funktion för att generara, skicka in antal som ska generaras, sen namn,bilder,beskrivning,pris
function generate($amount,$namn,$bilder,$beskrivning,$pris){
    $products = []; 
    
    // En for loop som generar produkter som är satta i 9 
    for($i = 0; $i <= $amount; $i++) { 
        //Vi använder rand för lagerstatus för att den ska slumpa mellan 0-50  
        $lagerAntal = rand(0,50);
        $prod = new Product($namn[$i], $bilder[$i], $beskrivning[$i], $pris[$i],$lagerAntal);
        array_push($products, $prod);
    }
    return $products;
}

//anropa generera
$arr = generate($generateNumber,$namn,$bilder,$beskrivning,$pris);
//returnera vår array json serialiserad
echo json_encode($arr);
?>