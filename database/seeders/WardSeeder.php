<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Others\Ward;

class WardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default
        $items = [
            //01_Mombasa
            //1_CHANGAMWE
            ["id"=> 1, "county_id"=>1, "sub_county_id"=>1, "name"=>"PORT REITZ", "created_at"=>now()],
            ["id"=> 2, "county_id"=>1, "sub_county_id"=>1, "name"=>"KIPEVU", "created_at"=>now()],
            ["id"=> 3, "county_id"=>1, "sub_county_id"=>1, "name"=>"AIRPORT", "created_at"=>now()],
            ["id"=> 4, "county_id"=>1, "sub_county_id"=>1, "name"=>"CHANGAMWE", "created_at"=>now()],
            ["id"=> 5, "county_id"=>1, "sub_county_id"=>1, "name"=>"CHAANI", "created_at"=>now()],
            //002_JOMVU
            ["id"=> 6, "county_id"=>1, "sub_county_id"=>2, "name"=>"JOMVU KUU", "created_at"=>now()],
            ["id"=> 7, "county_id"=>1, "sub_county_id"=>2, "name"=>"MIRITINI", "created_at"=>now()],
            ["id"=> 8, "county_id"=>1, "sub_county_id"=>2, "name"=>"MIKINDANI", "created_at"=>now()],
            //003_KISAUNI
            ["id"=> 9, "county_id"=>1, "sub_county_id"=>3, "name"=>"MJAMBERE", "created_at"=>now()],
            ["id"=>10, "county_id"=>1, "sub_county_id"=>3, "name"=>"JUNDA", "created_at"=>now()],
            ["id"=>11, "county_id"=>1, "sub_county_id"=>3, "name"=>"BAMBURI", "created_at"=>now()],
            ["id"=>12, "county_id"=>1, "sub_county_id"=>3, "name"=>"MWAKIRUNGE", "created_at"=>now()],
            ["id"=>13, "county_id"=>1, "sub_county_id"=>3, "name"=>"MTOPANGA", "created_at"=>now()],
            ["id"=>14, "county_id"=>1, "sub_county_id"=>3, "name"=>"MAGOGONI", "created_at"=>now()],
            ["id"=>15, "county_id"=>1, "sub_county_id"=>3, "name"=>"SHANZU", "created_at"=>now()],
            //004_NYALI
            ["id"=>16, "county_id"=>1, "sub_county_id"=>4, "name"=>"FRERE TOWN", "created_at"=>now()],
            ["id"=>17, "county_id"=>1, "sub_county_id"=>4, "name"=>"ZIWA LA NG'OMBE", "created_at"=>now()],
            ["id"=>18, "county_id"=>1, "sub_county_id"=>4, "name"=>"MKOMANI", "created_at"=>now()],
            ["id"=>19, "county_id"=>1, "sub_county_id"=>4, "name"=>"KONGOWEA", "created_at"=>now()],
            ["id"=>20, "county_id"=>1, "sub_county_id"=>4, "name"=>"KADZANDANI", "created_at"=>now()],
            //005_LIKONI
            ["id"=>21, "county_id"=>1, "sub_county_id"=>5, "name"=>"MTONGWE", "created_at"=>now()],
            ["id"=>22, "county_id"=>1, "sub_county_id"=>5, "name"=>"SHIKA ADABU", "created_at"=>now()],
            ["id"=>23, "county_id"=>1, "sub_county_id"=>5, "name"=>"BOFU", "created_at"=>now()],
            ["id"=>24, "county_id"=>1, "sub_county_id"=>5, "name"=>"LIKONI", "created_at"=>now()],
            ["id"=>25, "county_id"=>1, "sub_county_id"=>5, "name"=>"TIMBWANI", "created_at"=>now()],
            //006_MVITA
            ["id"=>26, "county_id"=>1, "sub_county_id"=>6, "name"=>"MJI WA KALE/MAKADARA", "created_at"=>now()],
            ["id"=>27, "county_id"=>1, "sub_county_id"=>6, "name"=>"TUDOR", "created_at"=>now()],
            ["id"=>28, "county_id"=>1, "sub_county_id"=>6, "name"=>"TONONOKA", "created_at"=>now()],
            ["id"=>29, "county_id"=>1, "sub_county_id"=>6, "name"=>"SHIMANZI/GANJONI", "created_at"=>now()],
            ["id"=>30, "county_id"=>1, "sub_county_id"=>6, "name"=>"MAJENGO", "created_at"=>now()],


            //02_Kwale
            //007_MSAMBWENI
            ["id"=>31, "county_id"=>2, "sub_county_id"=>7, "name"=>"GOMBATO BONGWE", "created_at"=>now()],
            ["id"=>32, "county_id"=>2, "sub_county_id"=>7, "name"=>"UKUNDA", "created_at"=>now()],
            ["id"=>33, "county_id"=>2, "sub_county_id"=>7, "name"=>"KINONDO", "created_at"=>now()],
            ["id"=>34, "county_id"=>2, "sub_county_id"=>7, "name"=>"RAMISI", "created_at"=>now()],
            //008_LUNGALUNGA
            ["id"=>35, "county_id"=>2, "sub_county_id"=>8, "name"=>"PONGWE/KIKONENI", "created_at"=>now()],
            ["id"=>36, "county_id"=>2, "sub_county_id"=>8, "name"=>"DZOMBO", "created_at"=>now()],
            ["id"=>37, "county_id"=>2, "sub_county_id"=>8, "name"=>"MWERENI", "created_at"=>now()],
            ["id"=>38, "county_id"=>2, "sub_county_id"=>8, "name"=>"VANGA", "created_at"=>now()],
            //009_MATUGA
            ["id"=>39, "county_id"=>2, "sub_county_id"=>9, "name"=>"TSIMBA GOLINI", "created_at"=>now()],
            ["id"=>40, "county_id"=>2, "sub_county_id"=>9, "name"=>"WAA", "created_at"=>now()],
            ["id"=>41, "county_id"=>2, "sub_county_id"=>9, "name"=>"TIWI", "created_at"=>now()],
            ["id"=>42, "county_id"=>2, "sub_county_id"=>9, "name"=>"KUBO SOUTH", "created_at"=>now()],
            ["id"=>43, "county_id"=>2, "sub_county_id"=>9, "name"=>"MKONGANI", "created_at"=>now()],
            //010_KINANGO
            ["id"=>44, "county_id"=>2, "sub_county_id"=>10, "name"=>"NDAVAYA", "created_at"=>now()],
            ["id"=>45, "county_id"=>2, "sub_county_id"=>10, "name"=>"PUMA", "created_at"=>now()],
            ["id"=>46, "county_id"=>2, "sub_county_id"=>10, "name"=>"KINANGO", "created_at"=>now()],
            ["id"=>47, "county_id"=>2, "sub_county_id"=>10, "name"=>"MACKINNON ROAD", "created_at"=>now()],
            ["id"=>48, "county_id"=>2, "sub_county_id"=>10, "name"=>"CHENGONI/SAMBURU", "created_at"=>now()],
            ["id"=>49, "county_id"=>2, "sub_county_id"=>10, "name"=>"MWAVUMBO", "created_at"=>now()],
            ["id"=>50, "county_id"=>2, "sub_county_id"=>10, "name"=>"KASEMENI", "created_at"=>now()],


            //03_Kilifi
            //011_KILIFI_NORTH
            ["id"=>51, "county_id"=>3, "sub_county_id"=>11, "name"=>"TEZO", "created_at"=>now()],
            ["id"=>52, "county_id"=>3, "sub_county_id"=>11, "name"=>"SOKONI", "created_at"=>now()],
            ["id"=>53, "county_id"=>3, "sub_county_id"=>11, "name"=>"KIBARANI", "created_at"=>now()],
            ["id"=>54, "county_id"=>3, "sub_county_id"=>11, "name"=>"DABASO", "created_at"=>now()],
            ["id"=>55, "county_id"=>3, "sub_county_id"=>11, "name"=>"MATSANGONI", "created_at"=>now()],
            ["id"=>56, "county_id"=>3, "sub_county_id"=>11, "name"=>"WATAMU", "created_at"=>now()],
            ["id"=>57, "county_id"=>3, "sub_county_id"=>11, "name"=>"MNARANI", "created_at"=>now()],
            //012_KILIFI_SOUTH
            ["id"=>58, "county_id"=>3, "sub_county_id"=>12, "name"=>"JUNJU", "created_at"=>now()],
            ["id"=>59, "county_id"=>3, "sub_county_id"=>12, "name"=>"MWARAKAYA", "created_at"=>now()],
            ["id"=>60, "county_id"=>3, "sub_county_id"=>12, "name"=>"SHIMO LA TEWA", "created_at"=>now()],
            ["id"=>61, "county_id"=>3, "sub_county_id"=>12, "name"=>"CHASIMBA", "created_at"=>now()],
            ["id"=>62, "county_id"=>3, "sub_county_id"=>12, "name"=>"MTEPENI", "created_at"=>now()],
            //013_KALOLENI
            ["id"=>63, "county_id"=>3, "sub_county_id"=>13, "name"=>"MARIAKANI", "created_at"=>now()],
            ["id"=>64, "county_id"=>3, "sub_county_id"=>13, "name"=>"KAYAFUNGO", "created_at"=>now()],
            ["id"=>65, "county_id"=>3, "sub_county_id"=>13, "name"=>"KALOLENI", "created_at"=>now()],
            ["id"=>66, "county_id"=>3, "sub_county_id"=>13, "name"=>"MWANAMWINGA", "created_at"=>now()],
            //014_RABAI
            ["id"=>67, "county_id"=>3, "sub_county_id"=>14, "name"=>"MWAWESA", "created_at"=>now()],
            ["id"=>68, "county_id"=>3, "sub_county_id"=>14, "name"=>"RURUMA", "created_at"=>now()],
            ["id"=>69, "county_id"=>3, "sub_county_id"=>14, "name"=>"KAMBE/RIBE", "created_at"=>now()],
            ["id"=>70, "county_id"=>3, "sub_county_id"=>14, "name"=>"RABAI/KISURUTINI", "created_at"=>now()],
            //015_KANZE
            ["id"=>71, "county_id"=>3, "sub_county_id"=>15, "name"=>"GANZE", "created_at"=>now()],
            ["id"=>72, "county_id"=>3, "sub_county_id"=>15, "name"=>"BAMBA", "created_at"=>now()],
            ["id"=>73, "county_id"=>3, "sub_county_id"=>15, "name"=>"JARIBUNI", "created_at"=>now()],
            ["id"=>74, "county_id"=>3, "sub_county_id"=>15, "name"=>"SOKOKE", "created_at"=>now()],
            //016_MALINDI
            ["id"=>75, "county_id"=>3, "sub_county_id"=>16, "name"=>"JILORE", "created_at"=>now()],
            ["id"=>76, "county_id"=>3, "sub_county_id"=>16, "name"=>"KAKUYUNI", "created_at"=>now()],
            ["id"=>77, "county_id"=>3, "sub_county_id"=>16, "name"=>"GANDA", "created_at"=>now()],
            ["id"=>78, "county_id"=>3, "sub_county_id"=>16, "name"=>"MALINDI TOWN", "created_at"=>now()],
            ["id"=>79, "county_id"=>3, "sub_county_id"=>16, "name"=>"SHELLA", "created_at"=>now()],
            //017_MAGARINI
            ["id"=>80, "county_id"=>3, "sub_county_id"=>17, "name"=>"MARAFA", "created_at"=>now()],
            ["id"=>81, "county_id"=>3, "sub_county_id"=>17, "name"=>"MAGARINI", "created_at"=>now()],
            ["id"=>82, "county_id"=>3, "sub_county_id"=>17, "name"=>"GONGONI", "created_at"=>now()],
            ["id"=>83, "county_id"=>3, "sub_county_id"=>17, "name"=>"ADU", "created_at"=>now()],
            ["id"=>84, "county_id"=>3, "sub_county_id"=>17, "name"=>"GARASHI", "created_at"=>now()],
            ["id"=>85, "county_id"=>3, "sub_county_id"=>17, "name"=>"SABAKI", "created_at"=>now()],


            //04_TanaRiver
            //018_GARSEN
            ["id"=>86, "county_id"=>4, "sub_county_id"=>18, "name"=>"KIPINI EAST", "created_at"=>now()],
            ["id"=>87, "county_id"=>4, "sub_county_id"=>18, "name"=>"GARSEN SOUTH", "created_at"=>now()],
            ["id"=>88, "county_id"=>4, "sub_county_id"=>18, "name"=>"KIPINI WEST", "created_at"=>now()],
            ["id"=>89, "county_id"=>4, "sub_county_id"=>18, "name"=>"GARSEN CENTRAL", "created_at"=>now()],
            ["id"=>90, "county_id"=>4, "sub_county_id"=>18, "name"=>"GARSEN WEST", "created_at"=>now()],
            ["id"=>91, "county_id"=>4, "sub_county_id"=>18, "name"=>"GARSEN NORTH", "created_at"=>now()],
            //019_GALOLE
            ["id"=>92, "county_id"=>4, "sub_county_id"=>19, "name"=>"KINAKOMBA", "created_at"=>now()],
            ["id"=>93, "county_id"=>4, "sub_county_id"=>19, "name"=>"MIKINDUNI", "created_at"=>now()],
            ["id"=>94, "county_id"=>4, "sub_county_id"=>19, "name"=>"CHEWANI", "created_at"=>now()],
            ["id"=>95, "county_id"=>4, "sub_county_id"=>19, "name"=>"WAYU", "created_at"=>now()],
            //020_BURA
            ["id"=>96, "county_id"=>4, "sub_county_id"=>20, "name"=>"CHEWELE", "created_at"=>now()],
            ["id"=>97, "county_id"=>4, "sub_county_id"=>20, "name"=>"HIRIMANI", "created_at"=>now()],
            ["id"=>98, "county_id"=>4, "sub_county_id"=>20, "name"=>"BANGALE", "created_at"=>now()],
            ["id"=>99, "county_id"=>4, "sub_county_id"=>20, "name"=>"SALA", "created_at"=>now()],
            ["id"=>100, "county_id"=>4, "sub_county_id"=>20, "name"=>"MADOGO", "created_at"=>now()],


            //05_Lamu
            //021_LAMU_EAST
            ["id"=>101, "county_id"=>5, "sub_county_id"=>21, "name"=>"FAZA", "created_at"=>now()],
            ["id"=>102, "county_id"=>5, "sub_county_id"=>21, "name"=>"KIUNGA", "created_at"=>now()],
            ["id"=>103, "county_id"=>5, "sub_county_id"=>21, "name"=>"BASUBA", "created_at"=>now()],
            //022_LAMU_WEST
            ["id"=>104, "county_id"=>5, "sub_county_id"=>22, "name"=>"SHELLA", "created_at"=>now()],
            ["id"=>105, "county_id"=>5, "sub_county_id"=>22, "name"=>"MKOMANI", "created_at"=>now()],
            ["id"=>106, "county_id"=>5, "sub_county_id"=>22, "name"=>"HINDI", "created_at"=>now()],
            ["id"=>107, "county_id"=>5, "sub_county_id"=>22, "name"=>"MKUNUMBI", "created_at"=>now()],
            ["id"=>108, "county_id"=>5, "sub_county_id"=>22, "name"=>"HONGWE", "created_at"=>now()],
            ["id"=>109, "county_id"=>5, "sub_county_id"=>22, "name"=>"WITU", "created_at"=>now()],
            ["id"=>110, "county_id"=>5, "sub_county_id"=>22, "name"=>"BAHARI", "created_at"=>now()],


            //06_TaitaTaveta
            //023_TAVETA
            ["id"=>111, "county_id"=>6, "sub_county_id"=>23, "name"=>"CHALA", "created_at"=>now()],
            ["id"=>112, "county_id"=>6, "sub_county_id"=>23, "name"=>"MAHOO", "created_at"=>now()],
            ["id"=>113, "county_id"=>6, "sub_county_id"=>23, "name"=>"BOMANI", "created_at"=>now()],
            ["id"=>114, "county_id"=>6, "sub_county_id"=>23, "name"=>"MBOGHONI", "created_at"=>now()],
            ["id"=>115, "county_id"=>6, "sub_county_id"=>23, "name"=>"MATA", "created_at"=>now()],
            //024_WUNDANYI
            ["id"=>116, "county_id"=>6, "sub_county_id"=>24, "name"=>"WUNDANYI/MBALE", "created_at"=>now()],
            ["id"=>117, "county_id"=>6, "sub_county_id"=>24, "name"=>"WERUGHA", "created_at"=>now()],
            ["id"=>118, "county_id"=>6, "sub_county_id"=>24, "name"=>"WUMINGU/KISHUSHE", "created_at"=>now()],
            ["id"=>119, "county_id"=>6, "sub_county_id"=>24, "name"=>"MWANDA/MGANGE", "created_at"=>now()],
            //025_MWATATE
            ["id"=>120, "county_id"=>6, "sub_county_id"=>25, "name"=>"RONG'E", "created_at"=>now()],
            ["id"=>121, "county_id"=>6, "sub_county_id"=>25, "name"=>"MWATATE", "created_at"=>now()],
            ["id"=>122, "county_id"=>6, "sub_county_id"=>25, "name"=>"BURA", "created_at"=>now()],
            ["id"=>123, "county_id"=>6, "sub_county_id"=>25, "name"=>"CHAWIA", "created_at"=>now()],
            ["id"=>124, "county_id"=>6, "sub_county_id"=>25, "name"=>"WUSI/KISHAMBA", "created_at"=>now()],
            //026_VOI
            ["id"=>125, "county_id"=>6, "sub_county_id"=>26, "name"=>"MBOLOLO", "created_at"=>now()],
            ["id"=>126, "county_id"=>6, "sub_county_id"=>26, "name"=>"SAGALLA", "created_at"=>now()],
            ["id"=>127, "county_id"=>6, "sub_county_id"=>26, "name"=>"KALOLENI", "created_at"=>now()],
            ["id"=>128, "county_id"=>6, "sub_county_id"=>26, "name"=>"MARUNGU", "created_at"=>now()],
            ["id"=>129, "county_id"=>6, "sub_county_id"=>26, "name"=>"KASIGAU", "created_at"=>now()],
            ["id"=>130, "county_id"=>6, "sub_county_id"=>26, "name"=>"NGOLIA", "created_at"=>now()],


            //07_Garissa
            //027_GARISSATOWNSHIP
            ["id"=>131, "county_id"=>7, "sub_county_id"=>27, "name"=>"WABERI", "created_at"=>now()],
            ["id"=>132, "county_id"=>7, "sub_county_id"=>27, "name"=>"GALBET", "created_at"=>now()],
            ["id"=>133, "county_id"=>7, "sub_county_id"=>27, "name"=>"TOWNSHIP", "created_at"=>now()],
            ["id"=>134, "county_id"=>7, "sub_county_id"=>27, "name"=>"IFTIN", "created_at"=>now()],
            //028_BALAMBALA
            ["id"=>135, "county_id"=>7, "sub_county_id"=>28, "name"=>"BALAMBALA", "created_at"=>now()],
            ["id"=>136, "county_id"=>7, "sub_county_id"=>28, "name"=>"DANYERE", "created_at"=>now()],
            ["id"=>137, "county_id"=>7, "sub_county_id"=>28, "name"=>"JARA JARA", "created_at"=>now()],
            ["id"=>138, "county_id"=>7, "sub_county_id"=>28, "name"=>"SAKA", "created_at"=>now()],
            ["id"=>139, "county_id"=>7, "sub_county_id"=>28, "name"=>"SANKURI", "created_at"=>now()],
            //029_LAGDERA
            ["id"=>140, "county_id"=>7, "sub_county_id"=>29, "name"=>"MODOGASHE", "created_at"=>now()],
            ["id"=>141, "county_id"=>7, "sub_county_id"=>29, "name"=>"BENANE", "created_at"=>now()],
            ["id"=>142, "county_id"=>7, "sub_county_id"=>29, "name"=>"GOREALE", "created_at"=>now()],
            ["id"=>143, "county_id"=>7, "sub_county_id"=>29, "name"=>"MAALIMIN", "created_at"=>now()],
            ["id"=>144, "county_id"=>7, "sub_county_id"=>29, "name"=>"SABENA", "created_at"=>now()],
            ["id"=>145, "county_id"=>7, "sub_county_id"=>29, "name"=>"BARAKI", "created_at"=>now()],
            //030_DADAAB
            ["id"=>146, "county_id"=>7, "sub_county_id"=>30, "name"=>"DERTU", "created_at"=>now()],
            ["id"=>147, "county_id"=>7, "sub_county_id"=>30, "name"=>"DADAAB", "created_at"=>now()],
            ["id"=>148, "county_id"=>7, "sub_county_id"=>30, "name"=>"LABASIGALE", "created_at"=>now()],
            ["id"=>149, "county_id"=>7, "sub_county_id"=>30, "name"=>"DAMAJALE", "created_at"=>now()],
            ["id"=>150, "county_id"=>7, "sub_county_id"=>30, "name"=>"LIBOI", "created_at"=>now()],
            ["id"=>151, "county_id"=>7, "sub_county_id"=>30, "name"=>"ABAKAILE", "created_at"=>now()],
            //031_FAFI
            ["id"=>152, "county_id"=>7, "sub_county_id"=>31, "name"=>"BURA", "created_at"=>now()],
            ["id"=>153, "county_id"=>7, "sub_county_id"=>31, "name"=>"DEKAHARIA", "created_at"=>now()],
            ["id"=>154, "county_id"=>7, "sub_county_id"=>31, "name"=>"JARAJILA", "created_at"=>now()],
            ["id"=>155, "county_id"=>7, "sub_county_id"=>31, "name"=>"FAFI", "created_at"=>now()],
            ["id"=>156, "county_id"=>7, "sub_county_id"=>31, "name"=>"NANIGHI", "created_at"=>now()],
            //032_IJARA
            ["id"=>157, "county_id"=>7, "sub_county_id"=>32, "name"=>"HULUGHO", "created_at"=>now()],
            ["id"=>158, "county_id"=>7, "sub_county_id"=>32, "name"=>"SANGAILU", "created_at"=>now()],
            ["id"=>159, "county_id"=>7, "sub_county_id"=>32, "name"=>"IJARA", "created_at"=>now()],
            ["id"=>160, "county_id"=>7, "sub_county_id"=>32, "name"=>"MASALANI", "created_at"=>now()],


            //08_Wajir
            //033_WAJIR_NORTH
            ["id"=>161, "county_id"=>8, "sub_county_id"=>33, "name"=>"GURAR", "created_at"=>now()],
            ["id"=>162, "county_id"=>8, "sub_county_id"=>33, "name"=>"BUTE", "created_at"=>now()],
            ["id"=>163, "county_id"=>8, "sub_county_id"=>33, "name"=>"KORONDILE", "created_at"=>now()],
            ["id"=>164, "county_id"=>8, "sub_county_id"=>33, "name"=>"MALKAGUFU", "created_at"=>now()],
            ["id"=>165, "county_id"=>8, "sub_county_id"=>33, "name"=>"BATALU", "created_at"=>now()],
            ["id"=>166, "county_id"=>8, "sub_county_id"=>33, "name"=>"DANABA", "created_at"=>now()],
            ["id"=>167, "county_id"=>8, "sub_county_id"=>33, "name"=>"GODOMA", "created_at"=>now()],
            //034_WAJIR_EAST
            ["id"=>168, "county_id"=>8, "sub_county_id"=>34, "name"=>"WAGBERI", "created_at"=>now()],
            ["id"=>169, "county_id"=>8, "sub_county_id"=>34, "name"=>"TOWNSHIP", "created_at"=>now()],
            ["id"=>170, "county_id"=>8, "sub_county_id"=>34, "name"=>"BARWAGO", "created_at"=>now()],
            ["id"=>171, "county_id"=>8, "sub_county_id"=>34, "name"=>"KHOROF/HARAR", "created_at"=>now()],
            //035_TARBAJ
            ["id"=>172, "county_id"=>8, "sub_county_id"=>35, "name"=>"ELBEN", "created_at"=>now()],
            ["id"=>173, "county_id"=>8, "sub_county_id"=>35, "name"=>"SARMAN", "created_at"=>now()],
            ["id"=>174, "county_id"=>8, "sub_county_id"=>35, "name"=>"TARBAJ", "created_at"=>now()],
            ["id"=>175, "county_id"=>8, "sub_county_id"=>35, "name"=>"WARGADUD", "created_at"=>now()],
            //036_WAJIR_WEST
            ["id"=>176, "county_id"=>8, "sub_county_id"=>36, "name"=>"ARBAJAHAN", "created_at"=>now()],
            ["id"=>177, "county_id"=>8, "sub_county_id"=>36, "name"=>"HADADO/ATHIBOHOL", "created_at"=>now()],
            ["id"=>178, "county_id"=>8, "sub_county_id"=>36, "name"=>"ADAMASAJIDE", "created_at"=>now()],
            ["id"=>179, "county_id"=>8, "sub_county_id"=>36, "name"=>"GANYURE/WAGALLA", "created_at"=>now()],
            //037_ELDAS
            ["id"=>180, "county_id"=>8, "sub_county_id"=>37, "name"=>"ELDAS", "created_at"=>now()],
            ["id"=>181, "county_id"=>8, "sub_county_id"=>37, "name"=>"DELLA", "created_at"=>now()],
            ["id"=>182, "county_id"=>8, "sub_county_id"=>37, "name"=>"LAKOLEY SOUTH/BASIR", "created_at"=>now()],
            ["id"=>183, "county_id"=>8, "sub_county_id"=>37, "name"=>"ELNUR/TULA TULA", "created_at"=>now()],
            ["id"=>184, "county_id"=>8, "sub_county_id"=>37, "name"=>"BENANE", "created_at"=>now()],
            ["id"=>185, "county_id"=>8, "sub_county_id"=>37, "name"=>"BURDER", "created_at"=>now()],
            ["id"=>186, "county_id"=>8, "sub_county_id"=>37, "name"=>"DADAJA BULLA", "created_at"=>now()],
            //038_WAJIR_SOUTH
            ["id"=>187, "county_id"=>8, "sub_county_id"=>38, "name"=>"HABASSWEIN", "created_at"=>now()],
            ["id"=>188, "county_id"=>8, "sub_county_id"=>38, "name"=>"LAGBOGHOL SOUTH", "created_at"=>now()],
            ["id"=>189, "county_id"=>8, "sub_county_id"=>38, "name"=>"IBRAHIM URE", "created_at"=>now()],
            ["id"=>190, "county_id"=>8, "sub_county_id"=>38, "name"=>"DIIF", "created_at"=>now()],


            //09_Mandera
            //039_MANDERA_WEST
            ["id"=>191, "county_id"=>9, "sub_county_id"=>39, "name"=>"TAKABA SOUTH", "created_at"=>now()],
            ["id"=>192, "county_id"=>9, "sub_county_id"=>39, "name"=>"TAKABA", "created_at"=>now()],
            ["id"=>193, "county_id"=>9, "sub_county_id"=>39, "name"=>"LAGSURE", "created_at"=>now()],
            ["id"=>194, "county_id"=>9, "sub_county_id"=>39, "name"=>"DANDU", "created_at"=>now()],
            ["id"=>195, "county_id"=>9, "sub_county_id"=>39, "name"=>"GITHER", "created_at"=>now()],
            //040_BANISSA
            ["id"=>196, "county_id"=>9, "sub_county_id"=>40, "name"=>"BANISSA", "created_at"=>now()],
            ["id"=>197, "county_id"=>9, "sub_county_id"=>40, "name"=>"DERKHALE", "created_at"=>now()],
            ["id"=>198, "county_id"=>9, "sub_county_id"=>40, "name"=>"GUBA", "created_at"=>now()],
            ["id"=>199, "county_id"=>9, "sub_county_id"=>40, "name"=>"MALKAMARI", "created_at"=>now()],
            ["id"=>200, "county_id"=>9, "sub_county_id"=>40, "name"=>"KILIWEHIRI", "created_at"=>now()],
            //041_MANDERA_NORTH
            ["id"=>201, "county_id"=>9, "sub_county_id"=>41, "name"=>"ASHABITO", "created_at"=>now()],
            ["id"=>202, "county_id"=>9, "sub_county_id"=>41, "name"=>"GUTICHA", "created_at"=>now()],
            ["id"=>203, "county_id"=>9, "sub_county_id"=>41, "name"=>"MOROTHILE", "created_at"=>now()],
            ["id"=>204, "county_id"=>9, "sub_county_id"=>41, "name"=>"RHAMU", "created_at"=>now()],
            ["id"=>205, "county_id"=>9, "sub_county_id"=>41, "name"=>"RHAMU-DIMTU", "created_at"=>now()],
            //042_MANDERA_SOUTH
            ["id"=>206, "county_id"=>9, "sub_county_id"=>42, "name"=>"WARGADUD", "created_at"=>now()],
            ["id"=>207, "county_id"=>9, "sub_county_id"=>42, "name"=>"KUTULO", "created_at"=>now()],
            ["id"=>208, "county_id"=>9, "sub_county_id"=>42, "name"=>"ELWAK SOUTH", "created_at"=>now()],
            ["id"=>209, "county_id"=>9, "sub_county_id"=>42, "name"=>"ELWAK NORTH", "created_at"=>now()],
            ["id"=>210, "county_id"=>9, "sub_county_id"=>42, "name"=>"SHIMBIR FATUMA", "created_at"=>now()],
            //043_MANDERA_EAST
            ["id"=>211, "county_id"=>9, "sub_county_id"=>43, "name"=>"ARABIA", "created_at"=>now()],
            ["id"=>212, "county_id"=>9, "sub_county_id"=>43, "name"=>"TOWNSHIP", "created_at"=>now()],
            ["id"=>213, "county_id"=>9, "sub_county_id"=>43, "name"=>"NEBOI", "created_at"=>now()],
            ["id"=>214, "county_id"=>9, "sub_county_id"=>43, "name"=>"KHALALIO", "created_at"=>now()],
            ["id"=>215, "county_id"=>9, "sub_county_id"=>43, "name"=>"LIBEHIA", "created_at"=>now()],
            //044_LAFEY
            ["id"=>216, "county_id"=>9, "sub_county_id"=>44, "name"=>"SALA", "created_at"=>now()],
            ["id"=>217, "county_id"=>9, "sub_county_id"=>44, "name"=>"FINO", "created_at"=>now()],
            ["id"=>218, "county_id"=>9, "sub_county_id"=>44, "name"=>"LAFEY", "created_at"=>now()],
            ["id"=>219, "county_id"=>9, "sub_county_id"=>44, "name"=>"WARANQARA", "created_at"=>now()],
            ["id"=>220, "county_id"=>9, "sub_county_id"=>44, "name"=>"ALANGO GOF", "created_at"=>now()],


             //10_Marsabit
             //045_MOYALE
             ["id"=>221, "county_id"=>10, "sub_county_id"=>45, "name"=>"BUTIYE", "created_at"=>now()],
             ["id"=>222, "county_id"=>10, "sub_county_id"=>45, "name"=>"SOLOLO", "created_at"=>now()],
             ["id"=>223, "county_id"=>10, "sub_county_id"=>45, "name"=>"HEILLU/MANYATTA", "created_at"=>now()],
             ["id"=>224, "county_id"=>10, "sub_county_id"=>45, "name"=>"GOLBO", "created_at"=>now()],
             ["id"=>225, "county_id"=>10, "sub_county_id"=>45, "name"=>"MOYALE TOWNSHIP", "created_at"=>now()],
             ["id"=>226, "county_id"=>10, "sub_county_id"=>45, "name"=>"URAN", "created_at"=>now()],
             ["id"=>227, "county_id"=>10, "sub_county_id"=>45, "name"=>"OBBU", "created_at"=>now()],
             //046_NORTH_HORR
             ["id"=>228, "county_id"=>10, "sub_county_id"=>46, "name"=>"DUKANA", "created_at"=>now()],
             ["id"=>229, "county_id"=>10, "sub_county_id"=>46, "name"=>"MAIKONA", "created_at"=>now()],
             ["id"=>230, "county_id"=>10, "sub_county_id"=>46, "name"=>"TURBI", "created_at"=>now()],
             ["id"=>231, "county_id"=>10, "sub_county_id"=>46, "name"=>"NORTH HORR", "created_at"=>now()],
             ["id"=>232, "county_id"=>10, "sub_county_id"=>46, "name"=>"ILLERET", "created_at"=>now()],
             //047_SAKU
             ["id"=>233, "county_id"=>10, "sub_county_id"=>47, "name"=>"SAGANTE/JALDESA", "created_at"=>now()],
             ["id"=>234, "county_id"=>10, "sub_county_id"=>47, "name"=>"KARARE", "created_at"=>now()],
             ["id"=>235, "county_id"=>10, "sub_county_id"=>47, "name"=>"MARSABIT CENTRAL", "created_at"=>now()],
             //048_LAISAMIS
             ["id"=>236, "county_id"=>10, "sub_county_id"=>48, "name"=>"LOIYANGALANI", "created_at"=>now()],
             ["id"=>237, "county_id"=>10, "sub_county_id"=>48, "name"=>"KARGI/SOUTH HORR", "created_at"=>now()],
             ["id"=>238, "county_id"=>10, "sub_county_id"=>48, "name"=>"KORR/NGURUNIT", "created_at"=>now()],
             ["id"=>239, "county_id"=>10, "sub_county_id"=>48, "name"=>"LOGO LOGO", "created_at"=>now()],
             ["id"=>240, "county_id"=>10, "sub_county_id"=>48, "name"=>"LAISAMIS", "created_at"=>now()],


            //11_Isiolo
            // 049_ISIOLO_NORTH
            ["id"=>241, "county_id"=>11, "sub_county_id"=>49, "name"=>"WABERA", "created_at"=>now()],
            ["id"=>242, "county_id"=>11, "sub_county_id"=>49, "name"=>"BULLA PESA", "created_at"=>now()],
            ["id"=>243, "county_id"=>11, "sub_county_id"=>49, "name"=>"CHARI", "created_at"=>now()],
            ["id"=>244, "county_id"=>11, "sub_county_id"=>49, "name"=>"CHERAB", "created_at"=>now()],
            ["id"=>245, "county_id"=>11, "sub_county_id"=>49, "name"=>"NGARE MARA", "created_at"=>now()],
            ["id"=>246, "county_id"=>11, "sub_county_id"=>49, "name"=>"BURAT", "created_at"=>now()],
            ["id"=>247, "county_id"=>11, "sub_county_id"=>49, "name"=>"OLDO/NYIRO", "created_at"=>now()],
            //050_ISIOLO_NORTH
            ["id"=>248, "county_id"=>11, "sub_county_id"=>50, "name"=>"GARBATULLA", "created_at"=>now()],
            ["id"=>249, "county_id"=>11, "sub_county_id"=>50, "name"=>"KINNA", "created_at"=>now()],
            ["id"=>250, "county_id"=>11, "sub_county_id"=>50, "name"=>"SERICHO", "created_at"=>now()],


            //12_Meru
            //051_IGEMBE_SOUTH
            ["id"=>251, "county_id"=>12, "sub_county_id"=>51, "name"=>"MAUA", "created_at"=>now()],
            ["id"=>252, "county_id"=>12, "sub_county_id"=>51, "name"=>"KIEGOI/ANTUBOCHIU", "created_at"=>now()],
            ["id"=>253, "county_id"=>12, "sub_county_id"=>51, "name"=>"ATHIRU GAITI", "created_at"=>now()],
            ["id"=>254, "county_id"=>12, "sub_county_id"=>51, "name"=>"AKACHIU", "created_at"=>now()],
            ["id"=>255, "county_id"=>12, "sub_county_id"=>51, "name"=>"KANUNI", "created_at"=>now()],
            //052_IGEMBE_CENTRAL
            ["id"=>256, "county_id"=>12, "sub_county_id"=>52, "name"=>"AKIRANG'ONDU", "created_at"=>now()],
            ["id"=>257, "county_id"=>12, "sub_county_id"=>52, "name"=>"ATHIRU RUUJINE", "created_at"=>now()],
            ["id"=>258, "county_id"=>12, "sub_county_id"=>52, "name"=>"IGEMBE EAST", "created_at"=>now()],
            ["id"=>259, "county_id"=>12, "sub_county_id"=>52, "name"=>"NJIA", "created_at"=>now()],
            ["id"=>260, "county_id"=>12, "sub_county_id"=>52, "name"=>"KANGETA", "created_at"=>now()],
            //053_IGEMBE_NORTH
            ["id"=>261, "county_id"=>12, "sub_county_id"=>53, "name"=>"ANTUAMBUI", "created_at"=>now()],
            ["id"=>262, "county_id"=>12, "sub_county_id"=>53, "name"=>"NTUNENE", "created_at"=>now()],
            ["id"=>263, "county_id"=>12, "sub_county_id"=>53, "name"=>"ANTUBETWE KIONGO", "created_at"=>now()],
            ["id"=>264, "county_id"=>12, "sub_county_id"=>53, "name"=>"NAATHU", "created_at"=>now()],
            ["id"=>265, "county_id"=>12, "sub_county_id"=>53, "name"=>"AMWATHI", "created_at"=>now()],
            //054_TIGANIA_WEST
            ["id"=>266, "county_id"=>12, "sub_county_id"=>54, "name"=>"ATHWANA", "created_at"=>now()],
            ["id"=>267, "county_id"=>12, "sub_county_id"=>54, "name"=>"AKITHII", "created_at"=>now()],
            ["id"=>268, "county_id"=>12, "sub_county_id"=>54, "name"=>"KIANJAI", "created_at"=>now()],
            ["id"=>269, "county_id"=>12, "sub_county_id"=>54, "name"=>"NKOMO", "created_at"=>now()],
            ["id"=>270, "county_id"=>12, "sub_county_id"=>54, "name"=>"MBEU", "created_at"=>now()],
            //055_TIGANIA_EAST
            ["id"=>271, "county_id"=>12, "sub_county_id"=>55, "name"=>"THANGATHA", "created_at"=>now()],
            ["id"=>272, "county_id"=>12, "sub_county_id"=>55, "name"=>"MIKINDURI", "created_at"=>now()],
            ["id"=>273, "county_id"=>12, "sub_county_id"=>55, "name"=>"KIGUCHWA", "created_at"=>now()],
            ["id"=>274, "county_id"=>12, "sub_county_id"=>55, "name"=>"MUTHARA", "created_at"=>now()],
            ["id"=>275, "county_id"=>12, "sub_county_id"=>55, "name"=>"KARAMA", "created_at"=>now()],
            //056_NORTH_IMENTI
            ["id"=>276, "county_id"=>12, "sub_county_id"=>56, "name"=>"MUNICIPALITY", "created_at"=>now()],
            ["id"=>277, "county_id"=>12, "sub_county_id"=>56, "name"=>"NTIMA EAST", "created_at"=>now()],
            ["id"=>278, "county_id"=>12, "sub_county_id"=>56, "name"=>"NTIMA WEST", "created_at"=>now()],
            ["id"=>279, "county_id"=>12, "sub_county_id"=>56, "name"=>"NYAKI WEST", "created_at"=>now()],
            ["id"=>280, "county_id"=>12, "sub_county_id"=>56, "name"=>"NYAKI EAST", "created_at"=>now()],
            //057_BUURI
            ["id"=>281, "county_id"=>12, "sub_county_id"=>57, "name"=>"TIMAU", "created_at"=>now()],
            ["id"=>282, "county_id"=>12, "sub_county_id"=>57, "name"=>"KISIMA", "created_at"=>now()],
            ["id"=>283, "county_id"=>12, "sub_county_id"=>57, "name"=>"KIIRUA/NAARI", "created_at"=>now()],
            ["id"=>284, "county_id"=>12, "sub_county_id"=>57, "name"=>"RUIRI/RWARERA", "created_at"=>now()],
            //058_CENTRAL_IMENTI
            ["id"=>285, "county_id"=>12, "sub_county_id"=>58, "name"=>"KIBIRICHIA", "created_at"=>now()],
            ["id"=>286, "county_id"=>12, "sub_county_id"=>58, "name"=>"MWANGANTHIA", "created_at"=>now()],
            ["id"=>287, "county_id"=>12, "sub_county_id"=>58, "name"=>"ABOTHUGUCHI CENTRAL", "created_at"=>now()],
            ["id"=>288, "county_id"=>12, "sub_county_id"=>58, "name"=>"ABOTHUGUCHI WEST", "created_at"=>now()],
            ["id"=>289, "county_id"=>12, "sub_county_id"=>58, "name"=>"KIAGU", "created_at"=>now()],
            //059_SOUTH_IMENTI
            ["id"=>290, "county_id"=>12, "sub_county_id"=>59, "name"=>"MITUNGUU", "created_at"=>now()],
            ["id"=>291, "county_id"=>12, "sub_county_id"=>59, "name"=>"IGOJI EAST", "created_at"=>now()],
            ["id"=>292, "county_id"=>12, "sub_county_id"=>59, "name"=>"IGOJI WEST", "created_at"=>now()],
            ["id"=>293, "county_id"=>12, "sub_county_id"=>59, "name"=>"ABOGETA EAST", "created_at"=>now()],
            ["id"=>294, "county_id"=>12, "sub_county_id"=>59, "name"=>"ABOGETA WEST", "created_at"=>now()],
            ["id"=>295, "county_id"=>12, "sub_county_id"=>59, "name"=>"NKUENE", "created_at"=>now()],


            //13_TharakaNithi
            //060_MAARA
            ["id"=>296, "county_id"=>13, "sub_county_id"=>60, "name"=>"MITHERU", "created_at"=>now()],
            ["id"=>297, "county_id"=>13, "sub_county_id"=>60, "name"=>"MUTHAMBI", "created_at"=>now()],
            ["id"=>298, "county_id"=>13, "sub_county_id"=>60, "name"=>"MWIMBI", "created_at"=>now()],
            ["id"=>299, "county_id"=>13, "sub_county_id"=>60, "name"=>"GANGA", "created_at"=>now()],
            ["id"=>300, "county_id"=>13, "sub_county_id"=>60, "name"=>"CHOGORIA", "created_at"=>now()],
            //061_CHUKA/IGAMBANG'OMBE
            ["id"=>301, "county_id"=>13, "sub_county_id"=>61, "name"=>"MARIANI", "created_at"=>now()],
            ["id"=>302, "county_id"=>13, "sub_county_id"=>61, "name"=>"KARINGANI", "created_at"=>now()],
            ["id"=>303, "county_id"=>13, "sub_county_id"=>61, "name"=>"MAGUMONI", "created_at"=>now()],
            ["id"=>304, "county_id"=>13, "sub_county_id"=>61, "name"=>"MUGWE", "created_at"=>now()],
            ["id"=>305, "county_id"=>13, "sub_county_id"=>61, "name"=>"IGAMBANG'OMBE", "created_at"=>now()],
            //062_THARAKA
            ["id"=>306, "county_id"=>13, "sub_county_id"=>62, "name"=>"GATUNGA", "created_at"=>now()],
            ["id"=>307, "county_id"=>13, "sub_county_id"=>62, "name"=>"MUKOTHIMA", "created_at"=>now()],
            ["id"=>308, "county_id"=>13, "sub_county_id"=>62, "name"=>"NKONDI", "created_at"=>now()],
            ["id"=>309, "county_id"=>13, "sub_county_id"=>62, "name"=>"CHIAKARIGA", "created_at"=>now()],
            ["id"=>310, "county_id"=>13, "sub_county_id"=>62, "name"=>"MARIMANTI", "created_at"=>now()],


            //14_Embu
            //063_MANYATTA
            ["id"=>311, "county_id"=>14, "sub_county_id"=>63, "name"=>"RUGURU/NGANDORI", "created_at"=>now()],
            ["id"=>312, "county_id"=>14, "sub_county_id"=>63, "name"=>"KITHIMU", "created_at"=>now()],
            ["id"=>313, "county_id"=>14, "sub_county_id"=>63, "name"=>"NGINDA", "created_at"=>now()],
            ["id"=>314, "county_id"=>14, "sub_county_id"=>63, "name"=>"MBETI NORTH", "created_at"=>now()],
            ["id"=>315, "county_id"=>14, "sub_county_id"=>63, "name"=>"KIRIMARI", "created_at"=>now()],
            ["id"=>316, "county_id"=>14, "sub_county_id"=>63, "name"=>"GATURI SOUTH", "created_at"=>now()],
            //064_RUNYENJES
            ["id"=>317, "county_id"=>14, "sub_county_id"=>64, "name"=>"GATURI NORTH", "created_at"=>now()],
            ["id"=>318, "county_id"=>14, "sub_county_id"=>64, "name"=>"KAGAARI SOUTH", "created_at"=>now()],
            ["id"=>319, "county_id"=>14, "sub_county_id"=>64, "name"=>"CENTRAL  WARD", "created_at"=>now()],
            ["id"=>320, "county_id"=>14, "sub_county_id"=>64, "name"=>"KAGAARI NORTH", "created_at"=>now()],
            ["id"=>321, "county_id"=>14, "sub_county_id"=>64, "name"=>"KYENI NORTH", "created_at"=>now()],
            ["id"=>322, "county_id"=>14, "sub_county_id"=>64, "name"=>"KYENI SOUTH", "created_at"=>now()],
            //065_MBEERE_SOUTH
            ["id"=>323, "county_id"=>14, "sub_county_id"=>65, "name"=>"MWEA", "created_at"=>now()],
            ["id"=>324, "county_id"=>14, "sub_county_id"=>65, "name"=>"MAKIMA", "created_at"=>now()],
            ["id"=>325, "county_id"=>14, "sub_county_id"=>65, "name"=>"MBETI SOUTH", "created_at"=>now()],
            ["id"=>326, "county_id"=>14, "sub_county_id"=>65, "name"=>"MAVURIA", "created_at"=>now()],
            ["id"=>327, "county_id"=>14, "sub_county_id"=>65, "name"=>"KIAMBERE", "created_at"=>now()],
            //066_MBEERE_NORTH
            ["id"=>328, "county_id"=>14, "sub_county_id"=>66, "name"=>"NTHAWA", "created_at"=>now()],
            ["id"=>329, "county_id"=>14, "sub_county_id"=>66, "name"=>"MUMINJI", "created_at"=>now()],
            ["id"=>330, "county_id"=>14, "sub_county_id"=>66, "name"=>"EVURORE", "created_at"=>now()],


            //15_Kitui
            //067_MWINGI_NORTH
            ["id"=>331, "county_id"=>15, "sub_county_id"=>67, "name"=>"NGOMENI", "created_at"=>now()],
            ["id"=>332, "county_id"=>15, "sub_county_id"=>67, "name"=>"KYUSO", "created_at"=>now()],
            ["id"=>333, "county_id"=>15, "sub_county_id"=>67, "name"=>"MUMONI", "created_at"=>now()],
            ["id"=>334, "county_id"=>15, "sub_county_id"=>67, "name"=>"TSEIKURU", "created_at"=>now()],
            ["id"=>335, "county_id"=>15, "sub_county_id"=>67, "name"=>"THARAKA", "created_at"=>now()],
            //068_MWINGI_WEST
            ["id"=>336, "county_id"=>15, "sub_county_id"=>68, "name"=>"KYOME/THAANA", "created_at"=>now()],
            ["id"=>337, "county_id"=>15, "sub_county_id"=>68, "name"=>"NGUUTANI", "created_at"=>now()],
            ["id"=>338, "county_id"=>15, "sub_county_id"=>68, "name"=>"MIGWANI", "created_at"=>now()],
            ["id"=>339, "county_id"=>15, "sub_county_id"=>68, "name"=>"KIOMO/KYETHANI", "created_at"=>now()],
            //069_MWINGI_CENTRAL
            ["id"=>340, "county_id"=>15, "sub_county_id"=>69, "name"=>"CENTRAL", "created_at"=>now()],
            ["id"=>341, "county_id"=>15, "sub_county_id"=>69, "name"=>"KIVOU", "created_at"=>now()],
            ["id"=>342, "county_id"=>15, "sub_county_id"=>69, "name"=>"NGUNI", "created_at"=>now()],
            ["id"=>343, "county_id"=>15, "sub_county_id"=>69, "name"=>"NUU", "created_at"=>now()],
            ["id"=>344, "county_id"=>15, "sub_county_id"=>69, "name"=>"MUI", "created_at"=>now()],
            ["id"=>345, "county_id"=>15, "sub_county_id"=>69, "name"=>"WAITA", "created_at"=>now()],
            //070_KITUI_WEST
            ["id"=>346, "county_id"=>15, "sub_county_id"=>70, "name"=>"MUTONGUNI", "created_at"=>now()],
            ["id"=>347, "county_id"=>15, "sub_county_id"=>70, "name"=>"KAUWI", "created_at"=>now()],
            ["id"=>348, "county_id"=>15, "sub_county_id"=>70, "name"=>"MATINYANI", "created_at"=>now()],
            ["id"=>349, "county_id"=>15, "sub_county_id"=>70, "name"=>"KWA MUTONGA/KITHUMULA", "created_at"=>now()],
            //071_KITUI_RURAL
            ["id"=>350, "county_id"=>15, "sub_county_id"=>71, "name"=>"KISASI", "created_at"=>now()],
            ["id"=>351, "county_id"=>15, "sub_county_id"=>71, "name"=>"MBITINI", "created_at"=>now()],
            ["id"=>352, "county_id"=>15, "sub_county_id"=>71, "name"=>"KWAVONZA/YATTA", "created_at"=>now()],
            ["id"=>353, "county_id"=>15, "sub_county_id"=>71, "name"=>"KANYANGI", "created_at"=>now()],
            //072_KITUI_CENTRAL
            ["id"=>354, "county_id"=>15, "sub_county_id"=>72, "name"=>"MIAMBANI", "created_at"=>now()],
            ["id"=>355, "county_id"=>15, "sub_county_id"=>72, "name"=>"TOWNSHIP", "created_at"=>now()],
            ["id"=>356, "county_id"=>15, "sub_county_id"=>72, "name"=>"KYANGWITHYA WEST", "created_at"=>now()],
            ["id"=>357, "county_id"=>15, "sub_county_id"=>72, "name"=>"MULANGO", "created_at"=>now()],
            ["id"=>358, "county_id"=>15, "sub_county_id"=>72, "name"=>"KYANGWITHYA EAST", "created_at"=>now()],
            //073_KITUI_EAST
            ["id"=>359, "county_id"=>15, "sub_county_id"=>73, "name"=>"ZOMBE/MWITIKA", "created_at"=>now()],
            ["id"=>360, "county_id"=>15, "sub_county_id"=>73, "name"=>"NZAMBANI", "created_at"=>now()],
            ["id"=>361, "county_id"=>15, "sub_county_id"=>73, "name"=>"CHULUNI", "created_at"=>now()],
            ["id"=>362, "county_id"=>15, "sub_county_id"=>73, "name"=>"VOO/KYAMATU", "created_at"=>now()],
            ["id"=>363, "county_id"=>15, "sub_county_id"=>73, "name"=>"ENDAU/MALALANI", "created_at"=>now()],
            ["id"=>364, "county_id"=>15, "sub_county_id"=>73, "name"=>"MUTITO/KALIKU", "created_at"=>now()],
            //074_KITUI_SOUTH
            ["id"=>365, "county_id"=>15, "sub_county_id"=>74, "name"=>"IKANGA/KYATUNE", "created_at"=>now()],
            ["id"=>366, "county_id"=>15, "sub_county_id"=>74, "name"=>"MUTOMO", "created_at"=>now()],
            ["id"=>367, "county_id"=>15, "sub_county_id"=>74, "name"=>"MUTHA", "created_at"=>now()],
            ["id"=>368, "county_id"=>15, "sub_county_id"=>74, "name"=>"IKUTHA", "created_at"=>now()],
            ["id"=>369, "county_id"=>15, "sub_county_id"=>74, "name"=>"KANZIKO", "created_at"=>now()],
            ["id"=>370, "county_id"=>15, "sub_county_id"=>74, "name"=>"ATHI", "created_at"=>now()],


            //16_Machakos
            //075_MASINGA
            ["id"=>371, "county_id"=>16, "sub_county_id"=>75, "name"=>"KIVAA", "created_at"=>now()],
            ["id"=>372, "county_id"=>16, "sub_county_id"=>75, "name"=>"MASINGA CENTRAL", "created_at"=>now()],
            ["id"=>373, "county_id"=>16, "sub_county_id"=>75, "name"=>"EKALAKALA", "created_at"=>now()],
            ["id"=>374, "county_id"=>16, "sub_county_id"=>75, "name"=>"MUTHESYA", "created_at"=>now()],
            ["id"=>375, "county_id"=>16, "sub_county_id"=>75, "name"=>"NDITHINI", "created_at"=>now()],
            //076_YATTA
            ["id"=>376, "county_id"=>16, "sub_county_id"=>76, "name"=>"NDALANI", "created_at"=>now()],
            ["id"=>377, "county_id"=>16, "sub_county_id"=>76, "name"=>"MATUU", "created_at"=>now()],
            ["id"=>378, "county_id"=>16, "sub_county_id"=>76, "name"=>"KITHIMANI", "created_at"=>now()],
            ["id"=>379, "county_id"=>16, "sub_county_id"=>76, "name"=>"IKOMBE", "created_at"=>now()],
            ["id"=>380, "county_id"=>16, "sub_county_id"=>76, "name"=>"KATANGI", "created_at"=>now()],
            //077_KANGUNDO
            ["id"=>381, "county_id"=>16, "sub_county_id"=>77, "name"=>"KANGUNDO NORTH", "created_at"=>now()],
            ["id"=>382, "county_id"=>16, "sub_county_id"=>77, "name"=>"KANGUNDO CENTRAL", "created_at"=>now()],
            ["id"=>383, "county_id"=>16, "sub_county_id"=>77, "name"=>"KANGUNDO EAST", "created_at"=>now()],
            ["id"=>384, "county_id"=>16, "sub_county_id"=>77, "name"=>"KANGUNDO WEST", "created_at"=>now()],
            //078_MATUNGULU
            ["id"=>385, "county_id"=>16, "sub_county_id"=>78, "name"=>"TALA", "created_at"=>now()],
            ["id"=>386, "county_id"=>16, "sub_county_id"=>78, "name"=>"MATUNGULU NORTH", "created_at"=>now()],
            ["id"=>387, "county_id"=>16, "sub_county_id"=>74, "name"=>"MATUNGULU EAST", "created_at"=>now()],
            ["id"=>388, "county_id"=>16, "sub_county_id"=>78, "name"=>"MATUNGULU WEST", "created_at"=>now()],
            ["id"=>389, "county_id"=>16, "sub_county_id"=>78, "name"=>"KYELENI", "created_at"=>now()],
            //079_KATHIANI
            ["id"=>390, "county_id"=>16, "sub_county_id"=>79, "name"=>"MITABONI", "created_at"=>now()],
            ["id"=>391, "county_id"=>16, "sub_county_id"=>79, "name"=>"KATHIANI CENTRAL", "created_at"=>now()],
            ["id"=>392, "county_id"=>16, "sub_county_id"=>79, "name"=>"UPPER KAEWA/IVETI", "created_at"=>now()],
            ["id"=>393, "county_id"=>16, "sub_county_id"=>79, "name"=>"LOWER KAEWA/KAANI", "created_at"=>now()],
            //080_MAVOKO
            ["id"=>394, "county_id"=>16, "sub_county_id"=>80, "name"=>"ATHI RIVER", "created_at"=>now()],
            ["id"=>395, "county_id"=>16, "sub_county_id"=>80, "name"=>"KINANIE", "created_at"=>now()],
            ["id"=>396, "county_id"=>16, "sub_county_id"=>80, "name"=>"MUTHWANI", "created_at"=>now()],
            ["id"=>397, "county_id"=>16, "sub_county_id"=>80, "name"=>"SYOKIMAU/MULOLONGO", "created_at"=>now()],
            //081_MACHAKOS_TOWN
            ["id"=>398, "county_id"=>16, "sub_county_id"=>81, "name"=>"KALAMA", "created_at"=>now()],
            ["id"=>399, "county_id"=>16, "sub_county_id"=>81, "name"=>"MUA", "created_at"=>now()],
            ["id"=>400, "county_id"=>16, "sub_county_id"=>81, "name"=>"MUTITUNI", "created_at"=>now()],
            ["id"=>401, "county_id"=>16, "sub_county_id"=>81, "name"=>"MACHAKOS CENTRAL", "created_at"=>now()],
            ["id"=>402, "county_id"=>16, "sub_county_id"=>81, "name"=>"MUMBUNI NORTH", "created_at"=>now()],
            ["id"=>403, "county_id"=>16, "sub_county_id"=>81, "name"=>"MUVUTI/KIIMA-KIMWE", "created_at"=>now()],
            ["id"=>404, "county_id"=>16, "sub_county_id"=>81, "name"=>"KOLA", "created_at"=>now()],
            //082_MWALA
            ["id"=>405, "county_id"=>16, "sub_county_id"=>82, "name"=>"MBIUNI", "created_at"=>now()],
            ["id"=>406, "county_id"=>16, "sub_county_id"=>82, "name"=>"MAKUTANO/ MWALA", "created_at"=>now()],
            ["id"=>407, "county_id"=>16, "sub_county_id"=>82, "name"=>"MASII", "created_at"=>now()],
            ["id"=>408, "county_id"=>16, "sub_county_id"=>82, "name"=>"MUTHETHENI", "created_at"=>now()],
            ["id"=>409, "county_id"=>16, "sub_county_id"=>82, "name"=>"WAMUNYU", "created_at"=>now()],
            ["id"=>410, "county_id"=>16, "sub_county_id"=>82, "name"=>"KIBAUNI", "created_at"=>now()],


            //17_Makueni
            //083_MBOONI
            ["id"=>411, "county_id"=>17, "sub_county_id"=>83, "name"=>"TULIMANI", "created_at"=>now()],
            ["id"=>412, "county_id"=>17, "sub_county_id"=>83, "name"=>"MBOONI", "created_at"=>now()],
            ["id"=>413, "county_id"=>17, "sub_county_id"=>83, "name"=>"KITHUNGO/KITUNDU", "created_at"=>now()],
            ["id"=>414, "county_id"=>17, "sub_county_id"=>83, "name"=>"KITETA/KISAU", "created_at"=>now()],
            ["id"=>415, "county_id"=>17, "sub_county_id"=>83, "name"=>"WAIA-KAKO", "created_at"=>now()],
            ["id"=>416, "county_id"=>17, "sub_county_id"=>83, "name"=>"KALAWA", "created_at"=>now()],
            //084_KILOME
            ["id"=>417, "county_id"=>17, "sub_county_id"=>84, "name"=>"KASIKEU", "created_at"=>now()],
            ["id"=>418, "county_id"=>17, "sub_county_id"=>84, "name"=>"MUKAA", "created_at"=>now()],
            ["id"=>419, "county_id"=>17, "sub_county_id"=>84, "name"=>"KIIMA KIU/KALANZONI", "created_at"=>now()],
            //085_KAITI
            ["id"=>420, "county_id"=>17, "sub_county_id"=>85, "name"=>"UKIA", "created_at"=>now()],
            ["id"=>421, "county_id"=>17, "sub_county_id"=>85, "name"=>"KEE", "created_at"=>now()],
            ["id"=>422, "county_id"=>17, "sub_county_id"=>85, "name"=>"KILUNGU", "created_at"=>now()],
            ["id"=>423, "county_id"=>17, "sub_county_id"=>85, "name"=>"ILIMA", "created_at"=>now()],
            //086_MAKUENI
            ["id"=>424, "county_id"=>17, "sub_county_id"=>86, "name"=>"WOTE", "created_at"=>now()],
            ["id"=>425, "county_id"=>17, "sub_county_id"=>86, "name"=>"MUVAU/KIKUUMINI", "created_at"=>now()],
            ["id"=>426, "county_id"=>17, "sub_county_id"=>86, "name"=>"MAVINDINI", "created_at"=>now()],
            ["id"=>427, "county_id"=>17, "sub_county_id"=>86, "name"=>"KITISE/KITHUKI", "created_at"=>now()],
            ["id"=>428, "county_id"=>17, "sub_county_id"=>86, "name"=>"KATHONZWENI", "created_at"=>now()],
            ["id"=>429, "county_id"=>17, "sub_county_id"=>86, "name"=>"NZAUI/KILILI/KALAMBA", "created_at"=>now()],
            ["id"=>430, "county_id"=>17, "sub_county_id"=>86, "name"=>"MBITINI", "created_at"=>now()],
            //087_KIBWEZI_WEST
            ["id"=>431, "county_id"=>17, "sub_county_id"=>87, "name"=>"MAKINDU", "created_at"=>now()],
            ["id"=>432, "county_id"=>17, "sub_county_id"=>87, "name"=>"NGUUMO", "created_at"=>now()],
            ["id"=>433, "county_id"=>17, "sub_county_id"=>87, "name"=>"KIKUMBULYU NORTH", "created_at"=>now()],
            ["id"=>434, "county_id"=>17, "sub_county_id"=>87, "name"=>"KIKUMBULYU SOUTH", "created_at"=>now()],
            ["id"=>435, "county_id"=>17, "sub_county_id"=>87, "name"=>"NGUU/MASUMBA", "created_at"=>now()],
            ["id"=>436, "county_id"=>17, "sub_county_id"=>87, "name"=>"EMALI/MULALA", "created_at"=>now()],
            //088_KIBWEZI_EAST
            ["id"=>437, "county_id"=>17, "sub_county_id"=>88, "name"=>"MASONGALENI", "created_at"=>now()],
            ["id"=>438, "county_id"=>17, "sub_county_id"=>88, "name"=>"MTITO ANDEI", "created_at"=>now()],
            ["id"=>439, "county_id"=>17, "sub_county_id"=>88, "name"=>"THANGE", "created_at"=>now()],
            ["id"=>440, "county_id"=>17, "sub_county_id"=>88, "name"=>"IVINGONI/NZAMBANI", "created_at"=>now()],


            //18_Nyandarua
            //089_KINANGOP
            ["id"=>441, "county_id"=>18, "sub_county_id"=>89, "name"=>"ENGINEER", "created_at"=>now()],
            ["id"=>442, "county_id"=>18, "sub_county_id"=>89, "name"=>"GATHARA", "created_at"=>now()],
            ["id"=>443, "county_id"=>18, "sub_county_id"=>89, "name"=>"NORTH KINANGOP", "created_at"=>now()],
            ["id"=>444, "county_id"=>18, "sub_county_id"=>89, "name"=>"MURUNGARU", "created_at"=>now()],
            ["id"=>445, "county_id"=>18, "sub_county_id"=>89, "name"=>"NJABINI\KIBURU", "created_at"=>now()],
            ["id"=>446, "county_id"=>18, "sub_county_id"=>89, "name"=>"NYAKIO", "created_at"=>now()],
            ["id"=>447, "county_id"=>18, "sub_county_id"=>89, "name"=>"GITHABAI", "created_at"=>now()],
            ["id"=>448, "county_id"=>18, "sub_county_id"=>89, "name"=>"MAGUMU", "created_at"=>now()],
            //090_KIPIPIRI
            ["id"=>449, "county_id"=>18, "sub_county_id"=>90, "name"=>"WANJOHI", "created_at"=>now()],
            ["id"=>450, "county_id"=>18, "sub_county_id"=>90, "name"=>"KIPIPIRI", "created_at"=>now()],
            ["id"=>451, "county_id"=>18, "sub_county_id"=>90, "name"=>"GETA", "created_at"=>now()],
            ["id"=>452, "county_id"=>18, "sub_county_id"=>90, "name"=>"GITHIORO", "created_at"=>now()],
            //091_OL_KALOU
            ["id"=>453, "county_id"=>18, "sub_county_id"=>91, "name"=>"KARAU", "created_at"=>now()],
            ["id"=>454, "county_id"=>18, "sub_county_id"=>91, "name"=>"KANJUIRI RANGE", "created_at"=>now()],
            ["id"=>455, "county_id"=>18, "sub_county_id"=>91, "name"=>"MIRANGINE", "created_at"=>now()],
            ["id"=>456, "county_id"=>18, "sub_county_id"=>91, "name"=>"KAIMBAGA", "created_at"=>now()],
            ["id"=>457, "county_id"=>18, "sub_county_id"=>91, "name"=>"RURII", "created_at"=>now()],
            //092_OL_JOROK
            ["id"=>458, "county_id"=>18, "sub_county_id"=>92, "name"=>"GATHANJI", "created_at"=>now()],
            ["id"=>459, "county_id"=>18, "sub_county_id"=>92, "name"=>"GATIMU", "created_at"=>now()],
            ["id"=>460, "county_id"=>18, "sub_county_id"=>92, "name"=>"WERU", "created_at"=>now()],
            ["id"=>461, "county_id"=>18, "sub_county_id"=>92, "name"=>"CHARAGITA", "created_at"=>now()],
            //093_NDARAGWA
            ["id"=>462, "county_id"=>18, "sub_county_id"=>93, "name"=>"LESHAU/PONDO", "created_at"=>now()],
            ["id"=>463, "county_id"=>18, "sub_county_id"=>93, "name"=>"KIRIITA", "created_at"=>now()],
            ["id"=>464, "county_id"=>18, "sub_county_id"=>93, "name"=>"CENTRAL", "created_at"=>now()],
            ["id"=>465, "county_id"=>18, "sub_county_id"=>93, "name"=>"SHAMATA", "created_at"=>now()],

            //19_Nyeri
            //094_TETU
            ["id"=>466, "county_id"=>19, "sub_county_id"=>94, "name"=>"DEDAN KIMANTHI", "created_at"=>now()],
            ["id"=>467, "county_id"=>19, "sub_county_id"=>94, "name"=>"WAMAGANA", "created_at"=>now()],
            ["id"=>468, "county_id"=>19, "sub_county_id"=>94, "name"=>"AGUTHI-GAAKI", "created_at"=>now()],
            //095_KIENI
            ["id"=>469, "county_id"=>19, "sub_county_id"=>95, "name"=>"MWEIGA", "created_at"=>now()],
            ["id"=>470, "county_id"=>19, "sub_county_id"=>95, "name"=>"NAROMORU KIAMATHAGA", "created_at"=>now()],
            ["id"=>471, "county_id"=>19, "sub_county_id"=>95, "name"=>"MWIYOGO/ENDARASHA", "created_at"=>now()],
            ["id"=>472, "county_id"=>19, "sub_county_id"=>95, "name"=>"MUGUNDA", "created_at"=>now()],
            ["id"=>473, "county_id"=>19, "sub_county_id"=>95, "name"=>"GATARAKWA", "created_at"=>now()],
            ["id"=>474, "county_id"=>19, "sub_county_id"=>95, "name"=>"THEGU RIVER", "created_at"=>now()],
            ["id"=>475, "county_id"=>19, "sub_county_id"=>95, "name"=>"KABARU", "created_at"=>now()],
            ["id"=>476, "county_id"=>19, "sub_county_id"=>95, "name"=>"GAKAWA", "created_at"=>now()],
            //096_MATHIRA
            ["id"=>477, "county_id"=>19, "sub_county_id"=>96, "name"=>"RUGURU", "created_at"=>now()],
            ["id"=>478, "county_id"=>19, "sub_county_id"=>96, "name"=>"MAGUTU", "created_at"=>now()],
            ["id"=>479, "county_id"=>19, "sub_county_id"=>96, "name"=>"IRIAINI", "created_at"=>now()],
            ["id"=>480, "county_id"=>19, "sub_county_id"=>96, "name"=>"KONYU", "created_at"=>now()],
            ["id"=>481, "county_id"=>19, "sub_county_id"=>96, "name"=>"KIRIMUKUYU", "created_at"=>now()],
            ["id"=>482, "county_id"=>19, "sub_county_id"=>96, "name"=>"KARATINA TOWN", "created_at"=>now()],
            //097_OTHAYA
            ["id"=>483, "county_id"=>19, "sub_county_id"=>97, "name"=>"MAHIGA", "created_at"=>now()],
            ["id"=>484, "county_id"=>19, "sub_county_id"=>97, "name"=>"IRIA-INI", "created_at"=>now()],
            ["id"=>485, "county_id"=>19, "sub_county_id"=>97, "name"=>"CHINGA", "created_at"=>now()],
            ["id"=>486, "county_id"=>19, "sub_county_id"=>97, "name"=>"KARIMA", "created_at"=>now()],
            //098_MUKURWEINI
            ["id"=>487, "county_id"=>19, "sub_county_id"=>98, "name"=>"GIKONDI", "created_at"=>now()],
            ["id"=>488, "county_id"=>19, "sub_county_id"=>98, "name"=>"RUGI", "created_at"=>now()],
            ["id"=>489, "county_id"=>19, "sub_county_id"=>98, "name"=>"MUKURWE-INI WEST", "created_at"=>now()],
            ["id"=>490, "county_id"=>19, "sub_county_id"=>98, "name"=>"MUKURWE-INI CENTRAL", "created_at"=>now()],
            //099_NYERI_TOWN
            ["id"=>491, "county_id"=>19, "sub_county_id"=>99, "name"=>"KIGANJO/MATHARI", "created_at"=>now()],
            ["id"=>492, "county_id"=>19, "sub_county_id"=>99, "name"=>"RWARE", "created_at"=>now()],
            ["id"=>493, "county_id"=>19, "sub_county_id"=>99, "name"=>"GATITU/MURUGURU", "created_at"=>now()],
            ["id"=>494, "county_id"=>19, "sub_county_id"=>99, "name"=>"RURING'U", "created_at"=>now()],
            ["id"=>495, "county_id"=>19, "sub_county_id"=>99, "name"=>"KAMAKWA/MUKARO", "created_at"=>now()],


            //20_Kirinyaga
            //100_MWEA
            ["id"=>496,	"county_id"=>20, "sub_county_id"=>100, "name"=>"MUTITHI", "created_at"=>now()],
            ["id"=>497,	"county_id"=>20, "sub_county_id"=>100, "name"=>"KANGAI", "created_at"=>now()],
            ["id"=>498,	"county_id"=>20, "sub_county_id"=>100, "name"=>"THIBA", "created_at"=>now()],
            ["id"=>499,	"county_id"=>20, "sub_county_id"=>100, "name"=>"WAMUMU", "created_at"=>now()],
            ["id"=>500,	"county_id"=>20, "sub_county_id"=>100, "name"=>"NYANGATI", "created_at"=>now()],
            ["id"=>501,	"county_id"=>20, "sub_county_id"=>100, "name"=>"MURINDUKO", "created_at"=>now()],
            ["id"=>502,	"county_id"=>20, "sub_county_id"=>100, "name"=>"GATHIGIRIRI", "created_at"=>now()],
            ["id"=>503,	"county_id"=>20, "sub_county_id"=>100, "name"=>"TEBERE", "created_at"=>now()],
            //101_GICHUGU
            ["id"=>504,	"county_id"=>20, "sub_county_id"=>101, "name"=>"KABARE", "created_at"=>now()],
            ["id"=>505,	"county_id"=>20, "sub_county_id"=>101, "name"=>"BARAGWI", "created_at"=>now()],
            ["id"=>506,	"county_id"=>20, "sub_county_id"=>101, "name"=>"NJUKIINI", "created_at"=>now()],
            ["id"=>507,	"county_id"=>20, "sub_county_id"=>101, "name"=>"NGARIAMA", "created_at"=>now()],
            ["id"=>508,	"county_id"=>20, "sub_county_id"=>101, "name"=>"KARUMANDI", "created_at"=>now()],
            //102_NDIA
            ["id"=>509,	"county_id"=>20, "sub_county_id"=>102, "name"=>"MUKURE", "created_at"=>now()],
            ["id"=>510,	"county_id"=>20, "sub_county_id"=>102, "name"=>"KIINE", "created_at"=>now()],
            ["id"=>511,	"county_id"=>20, "sub_county_id"=>102, "name"=>"KARITI", "created_at"=>now()],
            //103_KIRINYAGA_CENTRAL
            ["id"=>512,	"county_id"=>20, "sub_county_id"=>103, "name"=>"MUTIRA", "created_at"=>now()],
            ["id"=>513,	"county_id"=>20, "sub_county_id"=>103, "name"=>"KANYEKINI", "created_at"=>now()],
            ["id"=>514,	"county_id"=>20, "sub_county_id"=>103, "name"=>"KERUGOYA", "created_at"=>now()],
            ["id"=>515,	"county_id"=>20, "sub_county_id"=>103, "name"=>"INOI", "created_at"=>now()],


            //21_Muranga
            //104_KANGEMA
            ["id"=>516,	"county_id"=>21, "sub_county_id"=>104, "name"=>"KANYENYA-INI", "created_at"=>now()],
            ["id"=>517,	"county_id"=>21, "sub_county_id"=>104, "name"=>"MUGURU", "created_at"=>now()],
            ["id"=>518,	"county_id"=>21, "sub_county_id"=>104, "name"=>"RWATHIA", "created_at"=>now()],
            //105_MATHIOYA
            ["id"=>519,	"county_id"=>21, "sub_county_id"=>105, "name"=>"GITUGI", "created_at"=>now()],
            ["id"=>520,	"county_id"=>21, "sub_county_id"=>105, "name"=>"KIRU", "created_at"=>now()],
            ["id"=>521,	"county_id"=>21, "sub_county_id"=>105, "name"=>"KAMACHARIA", "created_at"=>now()],
            //106_KIHARU
            ["id"=>522,	"county_id"=>21, "sub_county_id"=>106, "name"=>"WANGU", "created_at"=>now()],
            ["id"=>523,	"county_id"=>21, "sub_county_id"=>106, "name"=>"MUGOIRI", "created_at"=>now()],
            ["id"=>524,	"county_id"=>21, "sub_county_id"=>106, "name"=>"MBIRI", "created_at"=>now()],
            ["id"=>525,	"county_id"=>21, "sub_county_id"=>106, "name"=>"TOWNSHIP", "created_at"=>now()],
            ["id"=>526,	"county_id"=>21, "sub_county_id"=>106, "name"=>"MURARANDIA", "created_at"=>now()],
            ["id"=>527,	"county_id"=>21, "sub_county_id"=>106, "name"=>"GATURI", "created_at"=>now()],
            //107_KIGUMO
            ["id"=>528,	"county_id"=>21, "sub_county_id"=>107, "name"=>"KAHUMBU", "created_at"=>now()],
            ["id"=>529,	"county_id"=>21, "sub_county_id"=>107, "name"=>"MUTHITHI", "created_at"=>now()],
            ["id"=>530,	"county_id"=>21, "sub_county_id"=>107, "name"=>"KIGUMO", "created_at"=>now()],
            ["id"=>531,	"county_id"=>21, "sub_county_id"=>107, "name"=>"KANGARI", "created_at"=>now()],
            ["id"=>532,	"county_id"=>21, "sub_county_id"=>107, "name"=>"KINYONA", "created_at"=>now()],
            //108_MARAGWA
            ["id"=>533,	"county_id"=>21, "sub_county_id"=>108, "name"=>"KIMORORI/WEMPA", "created_at"=>now()],
            ["id"=>534,	"county_id"=>21, "sub_county_id"=>108, "name"=>"MAKUYU", "created_at"=>now()],
            ["id"=>535,	"county_id"=>21, "sub_county_id"=>108, "name"=>"KAMBITI", "created_at"=>now()],
            ["id"=>536,	"county_id"=>21, "sub_county_id"=>108, "name"=>"KAMAHUHA", "created_at"=>now()],
            ["id"=>537,	"county_id"=>21, "sub_county_id"=>108, "name"=>"ICHAGAKI", "created_at"=>now()],
            ["id"=>538,	"county_id"=>21, "sub_county_id"=>108, "name"=>"NGINDA", "created_at"=>now()],
            //109_KANDARA
            ["id"=>539,	"county_id"=>21, "sub_county_id"=>109, "name"=>"NG'ARARIA", "created_at"=>now()],
            ["id"=>540,	"county_id"=>21, "sub_county_id"=>109, "name"=>"MURUKA", "created_at"=>now()],
            ["id"=>541,	"county_id"=>21, "sub_county_id"=>109, "name"=>"KAGUNDU-INI", "created_at"=>now()],
            ["id"=>542,	"county_id"=>21, "sub_county_id"=>109, "name"=>"GAICHANJIRU", "created_at"=>now()],
            ["id"=>543,	"county_id"=>21, "sub_county_id"=>109, "name"=>"ITHIRU", "created_at"=>now()],
            ["id"=>544,	"county_id"=>21, "sub_county_id"=>109, "name"=>"RUCHU", "created_at"=>now()],
            //110_GATANGA
            ["id"=>545,	"county_id"=>21, "sub_county_id"=>110, "name"=>"ITHANGA", "created_at"=>now()],
            ["id"=>546,	"county_id"=>21, "sub_county_id"=>110, "name"=>"KAKUZI/MITUBIRI", "created_at"=>now()],
            ["id"=>547,	"county_id"=>21, "sub_county_id"=>110, "name"=>"MUGUMO-INI", "created_at"=>now()],
            ["id"=>548,	"county_id"=>21, "sub_county_id"=>110, "name"=>"KIHUMBU-INI", "created_at"=>now()],
            ["id"=>549,	"county_id"=>21, "sub_county_id"=>110, "name"=>"GATANGA", "created_at"=>now()],
            ["id"=>550,	"county_id"=>21, "sub_county_id"=>110, "name"=>"KARIARA", "created_at"=>now()],


            //22_Kiambu
            //111_GATUNDU_SOUTH
            ["id"=>551,	"county_id"=>22, "sub_county_id"=>111, "name"=>"KIAMWANGI", "created_at"=>now()],
            ["id"=>552,	"county_id"=>22, "sub_county_id"=>111, "name"=>"KIGANJO", "created_at"=>now()],
            ["id"=>553,	"county_id"=>22, "sub_county_id"=>111, "name"=>"NDARUGU", "created_at"=>now()],
            ["id"=>554,	"county_id"=>22, "sub_county_id"=>111, "name"=>"NGENDA", "created_at"=>now()],
            //112_GATUNDU_NORTH
            ["id"=>555,	"county_id"=>22, "sub_county_id"=>112, "name"=>"GITUAMBA", "created_at"=>now()],
            ["id"=>556,	"county_id"=>22, "sub_county_id"=>112, "name"=>"GITHOBOKONI", "created_at"=>now()],
            ["id"=>557,	"county_id"=>22, "sub_county_id"=>112, "name"=>"CHANIA", "created_at"=>now()],
            ["id"=>558,	"county_id"=>22, "sub_county_id"=>112, "name"=>"MANG'U", "created_at"=>now()],
            //113_JUJA
            ["id"=>559,	"county_id"=>22, "sub_county_id"=>113, "name"=>"MURERA", "created_at"=>now()],
            ["id"=>560,	"county_id"=>22, "sub_county_id"=>113, "name"=>"THETA", "created_at"=>now()],
            ["id"=>561,	"county_id"=>22, "sub_county_id"=>113, "name"=>"JUJA", "created_at"=>now()],
            ["id"=>562,	"county_id"=>22, "sub_county_id"=>113, "name"=>"WITEITHIE", "created_at"=>now()],
            ["id"=>563,	"county_id"=>22, "sub_county_id"=>113, "name"=>"KALIMONI", "created_at"=>now()],
            //114_THIKA_TOWN
            ["id"=>564,	"county_id"=>22, "sub_county_id"=>114, "name"=>"TOWNSHIP", "created_at"=>now()],
            ["id"=>565,	"county_id"=>22, "sub_county_id"=>114, "name"=>"KAMENU", "created_at"=>now()],
            ["id"=>566,	"county_id"=>22, "sub_county_id"=>114, "name"=>"HOSPITAL", "created_at"=>now()],
            ["id"=>567,	"county_id"=>22, "sub_county_id"=>114, "name"=>"GATUANYAGA", "created_at"=>now()],
            ["id"=>568,	"county_id"=>22, "sub_county_id"=>114, "name"=>"NGOLIBA", "created_at"=>now()],
            //115_RUIRU
            ["id"=>569,	"county_id"=>22, "sub_county_id"=>115, "name"=>"GITOTHUA", "created_at"=>now()],
            ["id"=>570,	"county_id"=>22, "sub_county_id"=>115, "name"=>"BIASHARA", "created_at"=>now()],
            ["id"=>571,	"county_id"=>22, "sub_county_id"=>115, "name"=>"GATONGORA", "created_at"=>now()],
            ["id"=>572,	"county_id"=>22, "sub_county_id"=>115, "name"=>"KAHAWA SUKARI", "created_at"=>now()],
            ["id"=>573,	"county_id"=>22, "sub_county_id"=>115, "name"=>"KAHAWA WENDANI", "created_at"=>now()],
            ["id"=>574,	"county_id"=>22, "sub_county_id"=>115, "name"=>"KIUU", "created_at"=>now()],
            ["id"=>575,	"county_id"=>22, "sub_county_id"=>115, "name"=>"MWIKI", "created_at"=>now()],
            ["id"=>576,	"county_id"=>22, "sub_county_id"=>115, "name"=>"MWIHOKO", "created_at"=>now()],
            //116_GITHUNGURI
            ["id"=>577,	"county_id"=>22, "sub_county_id"=>116, "name"=>"GITHUNGURI", "created_at"=>now()],
            ["id"=>578,	"county_id"=>22, "sub_county_id"=>116, "name"=>"GITHIGA", "created_at"=>now()],
            ["id"=>579,	"county_id"=>22, "sub_county_id"=>116, "name"=>"IKINU", "created_at"=>now()],
            ["id"=>580,	"county_id"=>22, "sub_county_id"=>116, "name"=>"NGEWA", "created_at"=>now()],
            ["id"=>581,	"county_id"=>22, "sub_county_id"=>116, "name"=>"KOMOTHAI", "created_at"=>now()],
            //117_KIAMBU
            ["id"=>582,	"county_id"=>22, "sub_county_id"=>117, "name"=>"TING'ANG'A", "created_at"=>now()],
            ["id"=>583,	"county_id"=>22, "sub_county_id"=>117, "name"=>"NDUMBERI", "created_at"=>now()],
            ["id"=>584,	"county_id"=>22, "sub_county_id"=>117, "name"=>"RIABAI", "created_at"=>now()],
            ["id"=>585,	"county_id"=>22, "sub_county_id"=>117, "name"=>"TOWNSHIP", "created_at"=>now()],
            //118_KIAMBAA
            ["id"=>586,	"county_id"=>22, "sub_county_id"=>118, "name"=>"CIANDA", "created_at"=>now()],
            ["id"=>587,	"county_id"=>22, "sub_county_id"=>118, "name"=>"KARURI", "created_at"=>now()],
            ["id"=>588,	"county_id"=>22, "sub_county_id"=>118, "name"=>"NDENDERU", "created_at"=>now()],
            ["id"=>589,	"county_id"=>22, "sub_county_id"=>118, "name"=>"MUCHATHA", "created_at"=>now()],
            ["id"=>590,	"county_id"=>22, "sub_county_id"=>118, "name"=>"KIHARA", "created_at"=>now()],
            //119_KABETE
            ["id"=>591,	"county_id"=>22, "sub_county_id"=>119, "name"=>"GITARU", "created_at"=>now()],
            ["id"=>592,	"county_id"=>22, "sub_county_id"=>119, "name"=>"MUGUGA", "created_at"=>now()],
            ["id"=>593,	"county_id"=>22, "sub_county_id"=>119, "name"=>"NYADHUNA", "created_at"=>now()],
            ["id"=>594,	"county_id"=>22, "sub_county_id"=>119, "name"=>"KABETE", "created_at"=>now()],
            ["id"=>595,	"county_id"=>22, "sub_county_id"=>119, "name"=>"UTHIRU", "created_at"=>now()],
            //120_KIKUYU
            ["id"=>596,	"county_id"=>22, "sub_county_id"=>120, "name"=>"KARAI", "created_at"=>now()],
            ["id"=>597,	"county_id"=>22, "sub_county_id"=>120, "name"=>"NACHU", "created_at"=>now()],
            ["id"=>598,	"county_id"=>22, "sub_county_id"=>120, "name"=>"SIGONA", "created_at"=>now()],
            ["id"=>599,	"county_id"=>22, "sub_county_id"=>120, "name"=>"KIKUYU", "created_at"=>now()],
            ["id"=>600,	"county_id"=>22, "sub_county_id"=>120, "name"=>"KINOO", "created_at"=>now()],
            //121_LIMURU
            ["id"=>601,	"county_id"=>22, "sub_county_id"=>121, "name"=>"BIBIRIONI", "created_at"=>now()],
            ["id"=>602,	"county_id"=>22, "sub_county_id"=>121, "name"=>"LIMURU CENTRAL", "created_at"=>now()],
            ["id"=>603,	"county_id"=>22, "sub_county_id"=>121, "name"=>"NDEIYA", "created_at"=>now()],
            ["id"=>604,	"county_id"=>22, "sub_county_id"=>121, "name"=>"LIMURU EAST", "created_at"=>now()],
            ["id"=>605,	"county_id"=>22, "sub_county_id"=>121, "name"=>"NGECHA TIGONI", "created_at"=>now()],
            //122_LARI
            ["id"=>606,	"county_id"=>22, "sub_county_id"=>122, "name"=>"KINALE", "created_at"=>now()],
            ["id"=>607,	"county_id"=>22, "sub_county_id"=>122, "name"=>"KIJABE", "created_at"=>now()],
            ["id"=>608,	"county_id"=>22, "sub_county_id"=>122, "name"=>"NYANDUMA", "created_at"=>now()],
            ["id"=>609,	"county_id"=>22, "sub_county_id"=>122, "name"=>"KAMBURU", "created_at"=>now()],
            ["id"=>610,	"county_id"=>22, "sub_county_id"=>122, "name"=>"LARI/KIRENGA", "created_at"=>now()],


            //23_Turkana
            //123_TURKANA_NORTH
            ["id"=>611,	"county_id"=>23, "sub_county_id"=>123, "name"=>"KAERIS", "created_at"=>now()],
            ["id"=>612,	"county_id"=>23, "sub_county_id"=>123, "name"=>"LAKE ZONE", "created_at"=>now()],
            ["id"=>613,	"county_id"=>23, "sub_county_id"=>123, "name"=>"LAPUR", "created_at"=>now()],
            ["id"=>614,	"county_id"=>23, "sub_county_id"=>123, "name"=>"KAALENG/KAIKOR", "created_at"=>now()],
            ["id"=>615,	"county_id"=>23, "sub_county_id"=>123, "name"=>"KIBISH", "created_at"=>now()],
            ["id"=>616,	"county_id"=>23, "sub_county_id"=>123, "name"=>"NAKALALE", "created_at"=>now()],
            //124_TURKANA_WEST
            ["id"=>617,	"county_id"=>23, "sub_county_id"=>124, "name"=>"KAKUMA", "created_at"=>now()],
            ["id"=>618,	"county_id"=>23, "sub_county_id"=>124, "name"=>"LOPUR", "created_at"=>now()],
            ["id"=>619,	"county_id"=>23, "sub_county_id"=>124, "name"=>"LETEA", "created_at"=>now()],
            ["id"=>620,	"county_id"=>23, "sub_county_id"=>124, "name"=>"SONGOT", "created_at"=>now()],
            ["id"=>621,	"county_id"=>23, "sub_county_id"=>124, "name"=>"KALOBEYEI", "created_at"=>now()],
            ["id"=>622,	"county_id"=>23, "sub_county_id"=>124, "name"=>"LOKICHOGGIO", "created_at"=>now()],
            ["id"=>623,	"county_id"=>23, "sub_county_id"=>124, "name"=>"NANAAM", "created_at"=>now()],
            //125_TURKANA_CENTRAL
            ["id"=>624,	"county_id"=>23, "sub_county_id"=>125, "name"=>"KERIO DELTA", "created_at"=>now()],
            ["id"=>625,	"county_id"=>23, "sub_county_id"=>125, "name"=>"KANG'ATOTHA", "created_at"=>now()],
            ["id"=>626,	"county_id"=>23, "sub_county_id"=>125, "name"=>"KALOKOL", "created_at"=>now()],
            ["id"=>627,	"county_id"=>23, "sub_county_id"=>125, "name"=>"LODWAR TOWNSHIP", "created_at"=>now()],
            ["id"=>628,	"county_id"=>23, "sub_county_id"=>125, "name"=>"KANAMKEMER", "created_at"=>now()],
            //126_LOIMA
            ["id"=>629,	"county_id"=>23, "sub_county_id"=>126, "name"=>"KOTARUK/LOBEI", "created_at"=>now()],
            ["id"=>630,	"county_id"=>23, "sub_county_id"=>126, "name"=>"TURKWEL", "created_at"=>now()],
            ["id"=>631,	"county_id"=>23, "sub_county_id"=>126, "name"=>"LOIMA", "created_at"=>now()],
            ["id"=>632,	"county_id"=>23, "sub_county_id"=>126, "name"=>"LOKIRIAMA/LORENGIPPI", "created_at"=>now()],
            //127_TURKANA_SOUTH
            ["id"=>633,	"county_id"=>23, "sub_county_id"=>127, "name"=>"KAPUTIR", "created_at"=>now()],
            ["id"=>634,	"county_id"=>23, "sub_county_id"=>127, "name"=>"KATILU", "created_at"=>now()],
            ["id"=>635,	"county_id"=>23, "sub_county_id"=>127, "name"=>"LOBOKAT", "created_at"=>now()],
            ["id"=>636,	"county_id"=>23, "sub_county_id"=>127, "name"=>"KALAPATA", "created_at"=>now()],
            ["id"=>637,	"county_id"=>23, "sub_county_id"=>127, "name"=>"LOKICHAR", "created_at"=>now()],
            //128_TURKANA_EAST
            ["id"=>638,	"county_id"=>23, "sub_county_id"=>128, "name"=>"KAPEDO/NAPEITOM", "created_at"=>now()],
            ["id"=>639,	"county_id"=>23, "sub_county_id"=>128, "name"=>"KATILIA", "created_at"=>now()],
            ["id"=>640,	"county_id"=>23, "sub_county_id"=>128, "name"=>"LOKORI/KOCHODIN", "created_at"=>now()],


            //24_WestPokot
            //129_KAPENGURIA
            ["id"=>641,	"county_id"=>24, "sub_county_id"=>129, "name"=>"RIWO", "created_at"=>now()],
            ["id"=>642,	"county_id"=>24, "sub_county_id"=>129, "name"=>"KAPENGURIA", "created_at"=>now()],
            ["id"=>643,	"county_id"=>24, "sub_county_id"=>129, "name"=>"MNAGEI", "created_at"=>now()],
            ["id"=>644,	"county_id"=>24, "sub_county_id"=>129, "name"=>"SIYOI", "created_at"=>now()],
            ["id"=>645,	"county_id"=>24, "sub_county_id"=>129, "name"=>"ENDUGH", "created_at"=>now()],
            ["id"=>646,	"county_id"=>24, "sub_county_id"=>129, "name"=>"SOOK", "created_at"=>now()],
            //130_SIGOR
            ["id"=>647,	"county_id"=>24, "sub_county_id"=>130, "name"=>"SEKERR", "created_at"=>now()],
            ["id"=>648,	"county_id"=>24, "sub_county_id"=>130, "name"=>"MASOOL", "created_at"=>now()],
            ["id"=>649,	"county_id"=>24, "sub_county_id"=>130, "name"=>"LOMUT", "created_at"=>now()],
            ["id"=>650,	"county_id"=>24, "sub_county_id"=>130, "name"=>"WEIWEI", "created_at"=>now()],
            //131_KACHELIBA
            ["id"=>651,	"county_id"=>24, "sub_county_id"=>131, "name"=>"SUAM", "created_at"=>now()],
            ["id"=>652,	"county_id"=>24, "sub_county_id"=>131, "name"=>"KODICH", "created_at"=>now()],
            ["id"=>653,	"county_id"=>24, "sub_county_id"=>131, "name"=>"KASEI", "created_at"=>now()],
            ["id"=>654,	"county_id"=>24, "sub_county_id"=>131, "name"=>"KAPCHOK", "created_at"=>now()],
            ["id"=>655,	"county_id"=>24, "sub_county_id"=>131, "name"=>"KIWAWA", "created_at"=>now()],
            ["id"=>656,	"county_id"=>24, "sub_county_id"=>131, "name"=>"ALALE", "created_at"=>now()],
            //132_POKOT_SOUTH
            ["id"=>657,	"county_id"=>24, "sub_county_id"=>132, "name"=>"CHEPARERIA", "created_at"=>now()],
            ["id"=>658,	"county_id"=>24, "sub_county_id"=>132, "name"=>"BATEI", "created_at"=>now()],
            ["id"=>659,	"county_id"=>24, "sub_county_id"=>132, "name"=>"LELAN", "created_at"=>now()],
            ["id"=>660,	"county_id"=>24, "sub_county_id"=>132, "name"=>"TAPACH", "created_at"=>now()],


            //25_Samburu
            //133_SAMBURU_WEST
            ["id"=>661,	"county_id"=>25, "sub_county_id"=>133, "name"=>"LODOKEJEK", "created_at"=>now()],
            ["id"=>662,	"county_id"=>25, "sub_county_id"=>133, "name"=>"SUGUTA MARMAR", "created_at"=>now()],
            ["id"=>663,	"county_id"=>25, "sub_county_id"=>133, "name"=>"MARALAL", "created_at"=>now()],
            ["id"=>664,	"county_id"=>25, "sub_county_id"=>133, "name"=>"LOOSUK", "created_at"=>now()],
            ["id"=>665,	"county_id"=>25, "sub_county_id"=>133, "name"=>"PORO", "created_at"=>now()],
            //134_SAMBURU_NORTH
            ["id"=>666,	"county_id"=>25, "sub_county_id"=>134, "name"=>"EL-BARTA", "created_at"=>now()],
            ["id"=>667,	"county_id"=>25, "sub_county_id"=>134, "name"=>"NACHOLA", "created_at"=>now()],
            ["id"=>668,	"county_id"=>25, "sub_county_id"=>134, "name"=>"NDOTO", "created_at"=>now()],
            ["id"=>669,	"county_id"=>25, "sub_county_id"=>134, "name"=>"NYIRO", "created_at"=>now()],
            ["id"=>670,	"county_id"=>25, "sub_county_id"=>134, "name"=>"ANGATA NANYOKIE", "created_at"=>now()],
            ["id"=>671,	"county_id"=>25, "sub_county_id"=>134, "name"=>"BAAWA", "created_at"=>now()],
            //135_SAMBURU_EAST
            ["id"=>672,	"county_id"=>25, "sub_county_id"=>135, "name"=>"WASO", "created_at"=>now()],
            ["id"=>673,	"county_id"=>25, "sub_county_id"=>135, "name"=>"WAMBA WEST", "created_at"=>now()],
            ["id"=>674,	"county_id"=>25, "sub_county_id"=>135, "name"=>"WAMBA EAST", "created_at"=>now()],
            ["id"=>675,	"county_id"=>25, "sub_county_id"=>135, "name"=>"WAMBA NORTH", "created_at"=>now()],


            //26_TransNzoia
            //136_KWANZA
            ["id"=>676,	"county_id"=>26, "sub_county_id"=>136, "name"=>"KAPOMBOI", "created_at"=>now()],
            ["id"=>677,	"county_id"=>26, "sub_county_id"=>136, "name"=>"KWANZA", "created_at"=>now()],
            ["id"=>678,	"county_id"=>26, "sub_county_id"=>136, "name"=>"KEIYO", "created_at"=>now()],
            ["id"=>679,	"county_id"=>26, "sub_county_id"=>136, "name"=>"BIDII", "created_at"=>now()],
            //137_ENDEBESS
            ["id"=>680,	"county_id"=>26, "sub_county_id"=>137, "name"=>"CHEPCHOINA", "created_at"=>now()],
            ["id"=>681,	"county_id"=>26, "sub_county_id"=>137, "name"=>"ENDEBESS", "created_at"=>now()],
            ["id"=>682,	"county_id"=>26, "sub_county_id"=>137, "name"=>"MATUMBEI", "created_at"=>now()],
            //138_SABOTI
            ["id"=>683,	"county_id"=>26, "sub_county_id"=>138, "name"=>"KINYORO", "created_at"=>now()],
            ["id"=>684,	"county_id"=>26, "sub_county_id"=>138, "name"=>"MATISI", "created_at"=>now()],
            ["id"=>685,	"county_id"=>26, "sub_county_id"=>138, "name"=>"TUWANI", "created_at"=>now()],
            ["id"=>686,	"county_id"=>26, "sub_county_id"=>138, "name"=>"SABOTI", "created_at"=>now()],
            ["id"=>687,	"county_id"=>26, "sub_county_id"=>138, "name"=>"MACHEWA", "created_at"=>now()],
            //139_KIMININI
            ["id"=>688,	"county_id"=>26, "sub_county_id"=>139, "name"=>"KIMININI", "created_at"=>now()],
            ["id"=>689,	"county_id"=>26, "sub_county_id"=>139, "name"=>"WAITALUK", "created_at"=>now()],
            ["id"=>690,	"county_id"=>26, "sub_county_id"=>139, "name"=>"SIRENDE", "created_at"=>now()],
            ["id"=>691,	"county_id"=>26, "sub_county_id"=>139, "name"=>"HOSPITAL", "created_at"=>now()],
            ["id"=>692,	"county_id"=>26, "sub_county_id"=>139, "name"=>"SIKHENDU", "created_at"=>now()],
            ["id"=>693,	"county_id"=>26, "sub_county_id"=>139, "name"=>"NABISWA", "created_at"=>now()],
            //140_CHERANGANY
            ["id"=>694,	"county_id"=>26, "sub_county_id"=>140, "name"=>"SINYERERE", "created_at"=>now()],
            ["id"=>695,	"county_id"=>26, "sub_county_id"=>140, "name"=>"MAKUTANO", "created_at"=>now()],
            ["id"=>696,	"county_id"=>26, "sub_county_id"=>140, "name"=>"KAPLAMAI", "created_at"=>now()],
            ["id"=>697,	"county_id"=>26, "sub_county_id"=>140, "name"=>"MOTOSIET", "created_at"=>now()],
            ["id"=>698,	"county_id"=>26, "sub_county_id"=>140, "name"=>"CHERANGANY/SUWERWA", "created_at"=>now()],
            ["id"=>699,	"county_id"=>26, "sub_county_id"=>140, "name"=>"CHEPSIRO/KIPTOROR", "created_at"=>now()],
            ["id"=>700,	"county_id"=>26, "sub_county_id"=>140, "name"=>"SITATUNGA", "created_at"=>now()],


            //27_UasinGishu
            //141_SOY
            ["id"=>701,	"county_id"=>27, "sub_county_id"=>141, "name"=>"MOI'S BRIDGE", "created_at"=>now()],
            ["id"=>702,	"county_id"=>27, "sub_county_id"=>141, "name"=>"KAPKURES", "created_at"=>now()],
            ["id"=>703,	"county_id"=>27, "sub_county_id"=>141, "name"=>"ZIWA", "created_at"=>now()],
            ["id"=>704,	"county_id"=>27, "sub_county_id"=>141, "name"=>"SEGERO/BARSOMBE", "created_at"=>now()],
            ["id"=>705,	"county_id"=>27, "sub_county_id"=>141, "name"=>"KIPSOMBA", "created_at"=>now()],
            ["id"=>706,	"county_id"=>27, "sub_county_id"=>141, "name"=>"SOY", "created_at"=>now()],
            ["id"=>707,	"county_id"=>27, "sub_county_id"=>141, "name"=>"KUINET/KAPSUSWA", "created_at"=>now()],
            //142_TURBO
            ["id"=>708,	"county_id"=>27, "sub_county_id"=>142, "name"=>"NGENYILEL", "created_at"=>now()],
            ["id"=>709,	"county_id"=>27, "sub_county_id"=>142, "name"=>"TAPSAGOI", "created_at"=>now()],
            ["id"=>710,	"county_id"=>27, "sub_county_id"=>142, "name"=>"KAMAGUT", "created_at"=>now()],
            ["id"=>711,	"county_id"=>27, "sub_county_id"=>142, "name"=>"KIPLOMBE", "created_at"=>now()],
            ["id"=>712,	"county_id"=>27, "sub_county_id"=>142, "name"=>"KAPSAOS", "created_at"=>now()],
            ["id"=>713,	"county_id"=>27, "sub_county_id"=>142, "name"=>"HURUMA", "created_at"=>now()],
            //143_MOIBEN
            ["id"=>714,	"county_id"=>27, "sub_county_id"=>143, "name"=>"TEMBELIO", "created_at"=>now()],
            ["id"=>715,	"county_id"=>27, "sub_county_id"=>143, "name"=>"SERGOIT", "created_at"=>now()],
            ["id"=>716,	"county_id"=>27, "sub_county_id"=>143, "name"=>"KARUNA/MEIBEKI", "created_at"=>now()],
            ["id"=>717,	"county_id"=>27, "sub_county_id"=>143, "name"=>"MOIBEN", "created_at"=>now()],
            ["id"=>718,	"county_id"=>27, "sub_county_id"=>143, "name"=>"KIMUMU", "created_at"=>now()],
            //144_AINABKOI
            ["id"=>719,	"county_id"=>27, "sub_county_id"=>144, "name"=>"KAPSOYA", "created_at"=>now()],
            ["id"=>720,	"county_id"=>27, "sub_county_id"=>144, "name"=>"KAPTAGAT", "created_at"=>now()],
            ["id"=>721,	"county_id"=>27, "sub_county_id"=>144, "name"=>"AINABKOI/OLARE", "created_at"=>now()],
            //145_KAPSERET
            ["id"=>722,	"county_id"=>27, "sub_county_id"=>145, "name"=>"SIMAT/KAPSERET", "created_at"=>now()],
            ["id"=>723,	"county_id"=>27, "sub_county_id"=>145, "name"=>"KIPKENYO", "created_at"=>now()],
            ["id"=>724,	"county_id"=>27, "sub_county_id"=>145, "name"=>"NGERIA", "created_at"=>now()],
            ["id"=>725,	"county_id"=>27, "sub_county_id"=>145, "name"=>"MEGUN", "created_at"=>now()],
            ["id"=>726,	"county_id"=>27, "sub_county_id"=>145, "name"=>"LANGAS", "created_at"=>now()],
            //146_KESSES
            ["id"=>727,	"county_id"=>27, "sub_county_id"=>146, "name"=>"RACECOURSE", "created_at"=>now()],
            ["id"=>728,	"county_id"=>27, "sub_county_id"=>146, "name"=>"CHEPTIRET/KIPCHAMO", "created_at"=>now()],
            ["id"=>729,	"county_id"=>27, "sub_county_id"=>146, "name"=>"TULWET/CHUIYAT", "created_at"=>now()],
            ["id"=>730,	"county_id"=>27, "sub_county_id"=>146, "name"=>"TARAKWA", "created_at"=>now()],


            //28_ElgeyoMarakwet
            //147_MARAKWET_EAST
            ["id"=>731,	"county_id"=>28, "sub_county_id"=>147, "name"=>"KAPYEGO", "created_at"=>now()],
            ["id"=>732,	"county_id"=>28, "sub_county_id"=>147, "name"=>"SAMBIRIR", "created_at"=>now()],
            ["id"=>733,	"county_id"=>28, "sub_county_id"=>147, "name"=>"ENDO", "created_at"=>now()],
            ["id"=>734,	"county_id"=>28, "sub_county_id"=>147, "name"=>"EMBOBUT/EMBULOT", "created_at"=>now()],
            ["id"=>735,	"county_id"=>28, "sub_county_id"=>147, "name"=>"LELAN", "created_at"=>now()],
            ["id"=>736,	"county_id"=>28, "sub_county_id"=>147, "name"=>"SENGWER", "created_at"=>now()],
            //148_MARAKWET_WEST
            ["id"=>737,	"county_id"=>28, "sub_county_id"=>148, "name"=>"CHERANG'ANY/CHEBORORWA", "created_at"=>now()],
            ["id"=>738,	"county_id"=>28, "sub_county_id"=>148, "name"=>"MOIBEN/KUSERWO", "created_at"=>now()],
            ["id"=>739,	"county_id"=>28, "sub_county_id"=>148, "name"=>"KAPSOWAR", "created_at"=>now()],
            ["id"=>740,	"county_id"=>28, "sub_county_id"=>148, "name"=>"ARROR", "created_at"=>now()],
            //149_KEIYO_NORTH
            ["id"=>741,	"county_id"=>28, "sub_county_id"=>149, "name"=>"EMSOO", "created_at"=>now()],
            ["id"=>742,	"county_id"=>28, "sub_county_id"=>149, "name"=>"KAMARINY", "created_at"=>now()],
            ["id"=>743,	"county_id"=>28, "sub_county_id"=>149, "name"=>"KAPCHEMUTWA", "created_at"=>now()],
            ["id"=>744,	"county_id"=>28, "sub_county_id"=>149, "name"=>"TAMBACH", "created_at"=>now()],
            //150_KEIYO_SOUTH
            ["id"=>745,	"county_id"=>28, "sub_county_id"=>150, "name"=>"KAPTARAKWA", "created_at"=>now()],
            ["id"=>746,	"county_id"=>28, "sub_county_id"=>150, "name"=>"CHEPKORIO", "created_at"=>now()],
            ["id"=>747,	"county_id"=>28, "sub_county_id"=>150, "name"=>"SOY NORTH", "created_at"=>now()],
            ["id"=>748,	"county_id"=>28, "sub_county_id"=>150, "name"=>"SOY SOUTH", "created_at"=>now()],
            ["id"=>749,	"county_id"=>28, "sub_county_id"=>150, "name"=>"KABIEMIT", "created_at"=>now()],
            ["id"=>750,	"county_id"=>28, "sub_county_id"=>150, "name"=>"METKEI", "created_at"=>now()],

            //29_Nandi
            //151_TINDERET
            ["id"=>751,	"county_id"=>29, "sub_county_id"=>151, "name"=>"SONGHOR/SOBA", "created_at"=>now()],
            ["id"=>752,	"county_id"=>29, "sub_county_id"=>151, "name"=>"TINDIRET", "created_at"=>now()],
            ["id"=>753,	"county_id"=>29, "sub_county_id"=>151, "name"=>"CHEMELIL/CHEMASE", "created_at"=>now()],
            ["id"=>754,	"county_id"=>29, "sub_county_id"=>151, "name"=>"KAPSIMOTWO", "created_at"=>now()],
            //152_ALDAI
            ["id"=>755,	"county_id"=>29, "sub_county_id"=>152, "name"=>"KABWARENG", "created_at"=>now()],
            ["id"=>756,	"county_id"=>29, "sub_county_id"=>152, "name"=>"TERIK", "created_at"=>now()],
            ["id"=>757,	"county_id"=>29, "sub_county_id"=>152, "name"=>"KEMELOI-MARABA", "created_at"=>now()],
            ["id"=>758,	"county_id"=>29, "sub_county_id"=>152, "name"=>"KOBUJOI", "created_at"=>now()],
            ["id"=>759,	"county_id"=>29, "sub_county_id"=>152, "name"=>"KAPTUMO-KABOI", "created_at"=>now()],
            ["id"=>760,	"county_id"=>29, "sub_county_id"=>152, "name"=>"KOYO-NDURIO", "created_at"=>now()],
            //153_NANDI_HILLS
            ["id"=>761,	"county_id"=>29, "sub_county_id"=>153, "name"=>"NANDI HILLS", "created_at"=>now()],
            ["id"=>762,	"county_id"=>29, "sub_county_id"=>153, "name"=>"CHEPKUNYUK", "created_at"=>now()],
            ["id"=>763,	"county_id"=>29, "sub_county_id"=>153, "name"=>"OL'LESSOS", "created_at"=>now()],
            ["id"=>764,	"county_id"=>29, "sub_county_id"=>153, "name"=>"KAPCHORUA", "created_at"=>now()],
            //154_CHESUMEI
            ["id"=>765,	"county_id"=>29, "sub_county_id"=>154, "name"=>"CHEMUNDU/KAPNG'ETUNY", "created_at"=>now()],
            ["id"=>766,	"county_id"=>29, "sub_county_id"=>154, "name"=>"KOSIRAI", "created_at"=>now()],
            ["id"=>767,	"county_id"=>29, "sub_county_id"=>154, "name"=>"LELMOKWO/NGECHEK", "created_at"=>now()],
            ["id"=>768,	"county_id"=>29, "sub_county_id"=>154, "name"=>"KAPTEL/KAMOIYWO", "created_at"=>now()],
            ["id"=>769,	"county_id"=>29, "sub_county_id"=>154, "name"=>"KIPTUYA", "created_at"=>now()],
            //155_EMGWEN
            ["id"=>770,	"county_id"=>29, "sub_county_id"=>155, "name"=>"CHEPKUMIA", "created_at"=>now()],
            ["id"=>771,	"county_id"=>29, "sub_county_id"=>155, "name"=>"KAPKANGANI", "created_at"=>now()],
            ["id"=>772,	"county_id"=>29, "sub_county_id"=>155, "name"=>"KAPSABET", "created_at"=>now()],
            ["id"=>773,	"county_id"=>29, "sub_county_id"=>155, "name"=>"KILIBWONI", "created_at"=>now()],
            //156_MOSOP
            ["id"=>774,	"county_id"=>29, "sub_county_id"=>156, "name"=>"CHEPTERWAI", "created_at"=>now()],
            ["id"=>775,	"county_id"=>29, "sub_county_id"=>156, "name"=>"KIPKAREN", "created_at"=>now()],
            ["id"=>776,	"county_id"=>29, "sub_county_id"=>156, "name"=>"KURGUNG/SURUNGAI", "created_at"=>now()],
            ["id"=>777,	"county_id"=>29, "sub_county_id"=>156, "name"=>"KABIYET", "created_at"=>now()],
            ["id"=>778,	"county_id"=>29, "sub_county_id"=>156, "name"=>"NDALAT", "created_at"=>now()],
            ["id"=>779,	"county_id"=>29, "sub_county_id"=>156, "name"=>"KABISAGA", "created_at"=>now()],
            ["id"=>780,	"county_id"=>29, "sub_county_id"=>156, "name"=>"SANGALO/KEBULONIK", "created_at"=>now()],


            //30_Baringo
            //157_TIATY
            ["id"=>781,	"county_id"=>30, "sub_county_id"=>157, "name"=>"TIRIOKO", "created_at"=>now()],
            ["id"=>782,	"county_id"=>30, "sub_county_id"=>157, "name"=>"KOLOWA", "created_at"=>now()],
            ["id"=>783,	"county_id"=>30, "sub_county_id"=>157, "name"=>"RIBKWO", "created_at"=>now()],
            ["id"=>784,	"county_id"=>30, "sub_county_id"=>157, "name"=>"SILALE", "created_at"=>now()],
            ["id"=>785,	"county_id"=>30, "sub_county_id"=>157, "name"=>"LOIYAMOROCK", "created_at"=>now()],
            ["id"=>786,	"county_id"=>30, "sub_county_id"=>157, "name"=>"TANGULBEI/KOROSSI", "created_at"=>now()],
            ["id"=>787,	"county_id"=>30, "sub_county_id"=>157, "name"=>"CHURO/AMAYA", "created_at"=>now()],
            //158_BARINGO_NORTH
            ["id"=>788,	"county_id"=>30, "sub_county_id"=>158, "name"=>"BARWESSA", "created_at"=>now()],
            ["id"=>789,	"county_id"=>30, "sub_county_id"=>158, "name"=>"KABARTONJO", "created_at"=>now()],
            ["id"=>790,	"county_id"=>30, "sub_county_id"=>158, "name"=>"SAIMO/KIPSARAMAN", "created_at"=>now()],
            ["id"=>791,	"county_id"=>30, "sub_county_id"=>158, "name"=>"SAIMO/SOI", "created_at"=>now()],
            ["id"=>792,	"county_id"=>30, "sub_county_id"=>158, "name"=>"BARTABWA", "created_at"=>now()],
            //159_BARINGO_CENTRAL
            ["id"=>793,	"county_id"=>30, "sub_county_id"=>159, "name"=>"KABARNET", "created_at"=>now()],
            ["id"=>794,	"county_id"=>30, "sub_county_id"=>159, "name"=>"SACHO", "created_at"=>now()],
            ["id"=>795,	"county_id"=>30, "sub_county_id"=>159, "name"=>"TENGES", "created_at"=>now()],
            ["id"=>796,	"county_id"=>30, "sub_county_id"=>159, "name"=>"EWALEL/CHAPCHAP", "created_at"=>now()],
            ["id"=>797,	"county_id"=>30, "sub_county_id"=>159, "name"=>"KAPROPITA", "created_at"=>now()],
            //160_BARINGO_SOUTH
            ["id"=>798,	"county_id"=>30, "sub_county_id"=>160, "name"=>"MARIGAT", "created_at"=>now()],
            ["id"=>799,	"county_id"=>30, "sub_county_id"=>160, "name"=>"ILCHAMUS", "created_at"=>now()],
            ["id"=>800,	"county_id"=>30, "sub_county_id"=>160, "name"=>"MOCHONGOI", "created_at"=>now()],
            ["id"=>801,	"county_id"=>30, "sub_county_id"=>160, "name"=>"MUKUTANI", "created_at"=>now()],
            //161_MOGOTIO
            ["id"=>802,	"county_id"=>30, "sub_county_id"=>161, "name"=>"MOGOTIO", "created_at"=>now()],
            ["id"=>803,	"county_id"=>30, "sub_county_id"=>161, "name"=>"EMINING", "created_at"=>now()],
            ["id"=>804,	"county_id"=>30, "sub_county_id"=>161, "name"=>"KISANANA", "created_at"=>now()],
            //162_ELDAMA_RAVINE
            ["id"=>805,	"county_id"=>30, "sub_county_id"=>162, "name"=>"LEMBUS", "created_at"=>now()],
            ["id"=>806,	"county_id"=>30, "sub_county_id"=>162, "name"=>"LEMBUS KWEN", "created_at"=>now()],
            ["id"=>807,	"county_id"=>30, "sub_county_id"=>162, "name"=>"RAVINE", "created_at"=>now()],
            ["id"=>808,	"county_id"=>30, "sub_county_id"=>162, "name"=>"MUMBERES/MAJI MAZURI", "created_at"=>now()],
            ["id"=>809,	"county_id"=>30, "sub_county_id"=>162, "name"=>"LEMBUS/PERKERRA", "created_at"=>now()],
            ["id"=>810,	"county_id"=>30, "sub_county_id"=>162, "name"=>"KOIBATEK", "created_at"=>now()],


            //31_Laikipia
            //163_LAIKIPIA_WEST
            ["id"=>811,	"county_id"=>31, "sub_county_id"=>163, "name"=>"OL-MORAN", "created_at"=>now()],
            ["id"=>812,	"county_id"=>31, "sub_county_id"=>163, "name"=>"RUMURUTI TOWNSHIP", "created_at"=>now()],
            ["id"=>813,	"county_id"=>31, "sub_county_id"=>163, "name"=>"GITHIGA", "created_at"=>now()],
            ["id"=>814,	"county_id"=>31, "sub_county_id"=>163, "name"=>"MARMANET", "created_at"=>now()],
            ["id"=>815,	"county_id"=>31, "sub_county_id"=>163, "name"=>"IGWAMITI", "created_at"=>now()],
            ["id"=>816,	"county_id"=>31, "sub_county_id"=>163, "name"=>"SALAMA", "created_at"=>now()],
            //164_LAIKIPIA_EAST
            ["id"=>817,	"county_id"=>31, "sub_county_id"=>164, "name"=>"NGOBIT", "created_at"=>now()],
            ["id"=>818,	"county_id"=>31, "sub_county_id"=>164, "name"=>"TIGITHI", "created_at"=>now()],
            ["id"=>819,	"county_id"=>31, "sub_county_id"=>164, "name"=>"THINGITHU", "created_at"=>now()],
            ["id"=>820,	"county_id"=>31, "sub_county_id"=>164, "name"=>"NANYUKI", "created_at"=>now()],
            ["id"=>821,	"county_id"=>31, "sub_county_id"=>164, "name"=>"UMANDE", "created_at"=>now()],
            //165_LAIKIPIA_NORTH
            ["id"=>822,	"county_id"=>31, "sub_county_id"=>165, "name"=>"SOSIAN", "created_at"=>now()],
            ["id"=>823,	"county_id"=>31, "sub_county_id"=>165, "name"=>"SEGERA", "created_at"=>now()],
            ["id"=>824,	"county_id"=>31, "sub_county_id"=>165, "name"=>"MUGOGODO WEST", "created_at"=>now()],
            ["id"=>825,	"county_id"=>31, "sub_county_id"=>165, "name"=>"MUGOGODO EAST", "created_at"=>now()],


            //32_Nakuru
            //166_MOLO
            ["id"=>826,	"county_id"=>32, "sub_county_id"=>166, "name"=>"MARIASHONI", "created_at"=>now()],
            ["id"=>827,	"county_id"=>32, "sub_county_id"=>166, "name"=>"ELBURGON", "created_at"=>now()],
            ["id"=>828,	"county_id"=>32, "sub_county_id"=>166, "name"=>"TURI", "created_at"=>now()],
            ["id"=>829,	"county_id"=>32, "sub_county_id"=>166, "name"=>"MOLO", "created_at"=>now()],
            //167_NJORO
            ["id"=>830,	"county_id"=>32, "sub_county_id"=>167, "name"=>"MAU NAROK", "created_at"=>now()],
            ["id"=>831,	"county_id"=>32, "sub_county_id"=>167, "name"=>"MAUCHE", "created_at"=>now()],
            ["id"=>832,	"county_id"=>32, "sub_county_id"=>167, "name"=>"KIHINGO", "created_at"=>now()],
            ["id"=>833,	"county_id"=>32, "sub_county_id"=>167, "name"=>"NESSUIT", "created_at"=>now()],
            ["id"=>834,	"county_id"=>32, "sub_county_id"=>167, "name"=>"LARE", "created_at"=>now()],
            ["id"=>835,	"county_id"=>32, "sub_county_id"=>167, "name"=>"NJORO", "created_at"=>now()],
            //168_NAIVASHA
            ["id"=>836,	"county_id"=>32, "sub_county_id"=>168, "name"=>"BIASHARA", "created_at"=>now()],
            ["id"=>837,	"county_id"=>32, "sub_county_id"=>168, "name"=>"HELLS GATE", "created_at"=>now()],
            ["id"=>838,	"county_id"=>32, "sub_county_id"=>168, "name"=>"LAKE VIEW", "created_at"=>now()],
            ["id"=>839,	"county_id"=>32, "sub_county_id"=>168, "name"=>"MAI MAHIU", "created_at"=>now()],
            ["id"=>840,	"county_id"=>32, "sub_county_id"=>168, "name"=>"MAIELLA", "created_at"=>now()],
            ["id"=>841,	"county_id"=>32, "sub_county_id"=>168, "name"=>"OLKARIA", "created_at"=>now()],
            ["id"=>842,	"county_id"=>32, "sub_county_id"=>168, "name"=>"NAIVASHA EAST", "created_at"=>now()],
            ["id"=>843,	"county_id"=>32, "sub_county_id"=>168, "name"=>"VIWANDANI", "created_at"=>now()],
            //169_GILGIL
            ["id"=>844,	"county_id"=>32, "sub_county_id"=>169, "name"=>"GILGIL", "created_at"=>now()],
            ["id"=>845,	"county_id"=>32, "sub_county_id"=>169, "name"=>"ELEMENTAITA", "created_at"=>now()],
            ["id"=>846,	"county_id"=>32, "sub_county_id"=>169, "name"=>"MBARUK/EBURU", "created_at"=>now()],
            ["id"=>847,	"county_id"=>32, "sub_county_id"=>169, "name"=>"MALEWA WEST", "created_at"=>now()],
            ["id"=>848,	"county_id"=>32, "sub_county_id"=>169, "name"=>"MURINDATI", "created_at"=>now()],
            //170_KURESOI_SOUTH
            ["id"=>849,	"county_id"=>32, "sub_county_id"=>170, "name"=>"AMALO", "created_at"=>now()],
            ["id"=>850,	"county_id"=>32, "sub_county_id"=>170, "name"=>"KERINGET", "created_at"=>now()],
            ["id"=>851,	"county_id"=>32, "sub_county_id"=>170, "name"=>"KIPTAGICH", "created_at"=>now()],
            ["id"=>852,	"county_id"=>32, "sub_county_id"=>170, "name"=>"TINET", "created_at"=>now()],
            //171_KURESOI_NORTH
            ["id"=>853,	"county_id"=>32, "sub_county_id"=>171, "name"=>"KIPTORORO", "created_at"=>now()],
            ["id"=>854,	"county_id"=>32, "sub_county_id"=>171, "name"=>"NYOTA", "created_at"=>now()],
            ["id"=>855,	"county_id"=>32, "sub_county_id"=>171, "name"=>"SIRIKWA", "created_at"=>now()],
            ["id"=>856,	"county_id"=>32, "sub_county_id"=>171, "name"=>"KAMARA", "created_at"=>now()],
            //172_SUBUKIA
            ["id"=>857,	"county_id"=>32, "sub_county_id"=>172, "name"=>"SUBUKIA", "created_at"=>now()],
            ["id"=>858,	"county_id"=>32, "sub_county_id"=>172, "name"=>"WASEGES", "created_at"=>now()],
            ["id"=>859,	"county_id"=>32, "sub_county_id"=>172, "name"=>"KABAZI", "created_at"=>now()],
            //173_RONGAI
            ["id"=>860,	"county_id"=>32, "sub_county_id"=>173, "name"=>"MENENGAI WEST", "created_at"=>now()],
            ["id"=>861,	"county_id"=>32, "sub_county_id"=>173, "name"=>"SOIN", "created_at"=>now()],
            ["id"=>862,	"county_id"=>32, "sub_county_id"=>173, "name"=>"VISOI", "created_at"=>now()],
            ["id"=>863,	"county_id"=>32, "sub_county_id"=>173, "name"=>"MOSOP", "created_at"=>now()],
            ["id"=>864,	"county_id"=>32, "sub_county_id"=>173, "name"=>"SOLAI", "created_at"=>now()],
            //174_BAHATI
            ["id"=>865,	"county_id"=>32, "sub_county_id"=>174, "name"=>"DUNDORI", "created_at"=>now()],
            ["id"=>866,	"county_id"=>32, "sub_county_id"=>174, "name"=>"KABATINI", "created_at"=>now()],
            ["id"=>867,	"county_id"=>32, "sub_county_id"=>174, "name"=>"KIAMAINA", "created_at"=>now()],
            ["id"=>868,	"county_id"=>32, "sub_county_id"=>174, "name"=>"LANET/UMOJA", "created_at"=>now()],
            ["id"=>869,	"county_id"=>32, "sub_county_id"=>174, "name"=>"BAHATI", "created_at"=>now()],
            //175_NAKURU_TOWN_WEST
            ["id"=>870,	"county_id"=>32, "sub_county_id"=>175, "name"=>"BARUT", "created_at"=>now()],
            ["id"=>871,	"county_id"=>32, "sub_county_id"=>175, "name"=>"LONDON", "created_at"=>now()],
            ["id"=>872,	"county_id"=>32, "sub_county_id"=>175, "name"=>"KAPTEMBWO", "created_at"=>now()],
            ["id"=>873,	"county_id"=>32, "sub_county_id"=>175, "name"=>"KAPKURES", "created_at"=>now()],
            ["id"=>874,	"county_id"=>32, "sub_county_id"=>175, "name"=>"RHODA", "created_at"=>now()],
            ["id"=>875,	"county_id"=>32, "sub_county_id"=>175, "name"=>"SHAABAB", "created_at"=>now()],
            //176_NAKURU_TOWN_EAST
            ["id"=>876,	"county_id"=>32, "sub_county_id"=>176, "name"=>"BIASHARA", "created_at"=>now()],
            ["id"=>877,	"county_id"=>32, "sub_county_id"=>176, "name"=>"KIVUMBINI", "created_at"=>now()],
            ["id"=>878,	"county_id"=>32, "sub_county_id"=>176, "name"=>"FLAMINGO", "created_at"=>now()],
            ["id"=>879,	"county_id"=>32, "sub_county_id"=>176, "name"=>"MENENGAI", "created_at"=>now()],
            ["id"=>880,	"county_id"=>32, "sub_county_id"=>176, "name"=>"NAKURU EAST", "created_at"=>now()],


            //33_Narok
            //177_KILGORIS
            ["id"=>881,	"county_id"=>33, "sub_county_id"=>177, "name"=>"KILGORIS CENTRAL", "created_at"=>now()],
            ["id"=>882,	"county_id"=>33, "sub_county_id"=>177, "name"=>"KEYIAN", "created_at"=>now()],
            ["id"=>883,	"county_id"=>33, "sub_county_id"=>177, "name"=>"ANGATA BARIKOI", "created_at"=>now()],
            ["id"=>884,	"county_id"=>33, "sub_county_id"=>177, "name"=>"SHANKOE", "created_at"=>now()],
            ["id"=>885,	"county_id"=>33, "sub_county_id"=>177, "name"=>"KIMINTET", "created_at"=>now()],
            ["id"=>886,	"county_id"=>33, "sub_county_id"=>177, "name"=>"LOLGORIAN", "created_at"=>now()],
            //178_EMURUA_DIKIRR
            ["id"=>887,	"county_id"=>33, "sub_county_id"=>178, "name"=>"ILKERIN", "created_at"=>now()],
            ["id"=>888,	"county_id"=>33, "sub_county_id"=>178, "name"=>"OLOlMASANI", "created_at"=>now()],
            ["id"=>889,	"county_id"=>33, "sub_county_id"=>178, "name"=>"MOGONDO", "created_at"=>now()],
            ["id"=>890,	"county_id"=>33, "sub_county_id"=>178, "name"=>"KAPSASIAN", "created_at"=>now()],
            //179_NAROK_NORTH
            ["id"=>891,	"county_id"=>33, "sub_county_id"=>179, "name"=>"OLPUSIMORU", "created_at"=>now()],
            ["id"=>892,	"county_id"=>33, "sub_county_id"=>179, "name"=>"OLOKURTO", "created_at"=>now()],
            ["id"=>893,	"county_id"=>33, "sub_county_id"=>179, "name"=>"NAROK TOWN", "created_at"=>now()],
            ["id"=>894,	"county_id"=>33, "sub_county_id"=>179, "name"=>"NKARETA", "created_at"=>now()],
            ["id"=>895,	"county_id"=>33, "sub_county_id"=>179, "name"=>"OLORROPIL", "created_at"=>now()],
            ["id"=>896,	"county_id"=>33, "sub_county_id"=>179, "name"=>"MELILI", "created_at"=>now()],
            //180_NAROK_EAST
            ["id"=>897,	"county_id"=>33, "sub_county_id"=>180, "name"=>"MOSIRO", "created_at"=>now()],
            ["id"=>898,	"county_id"=>33, "sub_county_id"=>180, "name"=>"ILDAMAT", "created_at"=>now()],
            ["id"=>899,	"county_id"=>33, "sub_county_id"=>180, "name"=>"KEEKONYOKIE", "created_at"=>now()],
            ["id"=>900,	"county_id"=>33, "sub_county_id"=>180, "name"=>"SUSWA", "created_at"=>now()],
            //181_NAROK_SOUTH
            ["id"=>901,	"county_id"=>33, "sub_county_id"=>181, "name"=>"MAJIMOTO/NAROOSURA", "created_at"=>now()],
            ["id"=>902,	"county_id"=>33, "sub_county_id"=>181, "name"=>"OLOLULUNG'A", "created_at"=>now()],
            ["id"=>903,	"county_id"=>33, "sub_county_id"=>181, "name"=>"MELELO", "created_at"=>now()],
            ["id"=>904,	"county_id"=>33, "sub_county_id"=>181, "name"=>"LOITA", "created_at"=>now()],
            ["id"=>905,	"county_id"=>33, "sub_county_id"=>181, "name"=>"SOGOO", "created_at"=>now()],
            ["id"=>906,	"county_id"=>33, "sub_county_id"=>181, "name"=>"SAGAMIAN", "created_at"=>now()],
            //182_NAROK_WEST
            ["id"=>907,	"county_id"=>33, "sub_county_id"=>182, "name"=>"ILMOTIOK", "created_at"=>now()],
            ["id"=>908,	"county_id"=>33, "sub_county_id"=>182, "name"=>"MARA", "created_at"=>now()],
            ["id"=>909,	"county_id"=>33, "sub_county_id"=>182, "name"=>"SIANA", "created_at"=>now()],
            ["id"=>910,	"county_id"=>33, "sub_county_id"=>182, "name"=>"NAIKARRA", "created_at"=>now()],


            //34_Kajiado
            //183_KAJIADO_NORTH
            ["id"=>911,	"county_id"=>34, "sub_county_id"=>183, "name"=>"OLKERI", "created_at"=>now()],
            ["id"=>912,	"county_id"=>34, "sub_county_id"=>183, "name"=>"ONGATA RONGAI", "created_at"=>now()],
            ["id"=>913,	"county_id"=>34, "sub_county_id"=>183, "name"=>"NKAIMURUNYA", "created_at"=>now()],
            ["id"=>914,	"county_id"=>34, "sub_county_id"=>183, "name"=>"OLOOLUA", "created_at"=>now()],
            ["id"=>915,	"county_id"=>34, "sub_county_id"=>183, "name"=>"NGONG", "created_at"=>now()],
            //184_KAJIADO_CENTRAL
            ["id"=>916,	"county_id"=>34, "sub_county_id"=>184, "name"=>"PURKO", "created_at"=>now()],
            ["id"=>917,	"county_id"=>34, "sub_county_id"=>184, "name"=>"ILDAMAT", "created_at"=>now()],
            ["id"=>918,	"county_id"=>34, "sub_county_id"=>184, "name"=>"DALALEKUTUK", "created_at"=>now()],
            ["id"=>919,	"county_id"=>34, "sub_county_id"=>184, "name"=>"MATAPATO NORTH", "created_at"=>now()],
            ["id"=>920,	"county_id"=>34, "sub_county_id"=>184, "name"=>"MATAPATO SOUTH", "created_at"=>now()],
            //185_KAJIADO_EAST
            ["id"=>921,	"county_id"=>34, "sub_county_id"=>185, "name"=>"KAPUTIEI NORTH", "created_at"=>now()],
            ["id"=>922,	"county_id"=>34, "sub_county_id"=>185, "name"=>"KITENGELA", "created_at"=>now()],
            ["id"=>923,	"county_id"=>34, "sub_county_id"=>185, "name"=>"OLOOSIRKON/SHOLINKE", "created_at"=>now()],
            ["id"=>924,	"county_id"=>34, "sub_county_id"=>185, "name"=>"KENYAWA-POKA", "created_at"=>now()],
            ["id"=>925,	"county_id"=>34, "sub_county_id"=>185, "name"=>"IMARORO", "created_at"=>now()],
            //186_KAJIADO_WEST
            ["id"=>926,	"county_id"=>34, "sub_county_id"=>186, "name"=>"KEEKONYOKIE", "created_at"=>now()],
            ["id"=>927,	"county_id"=>34, "sub_county_id"=>186, "name"=>"ILOODOKILANI", "created_at"=>now()],
            ["id"=>928,	"county_id"=>34, "sub_county_id"=>186, "name"=>"MAGADI", "created_at"=>now()],
            ["id"=>929,	"county_id"=>34, "sub_county_id"=>186, "name"=>"EWUASO OoNKIDONG'I", "created_at"=>now()],
            ["id"=>930,	"county_id"=>34, "sub_county_id"=>186, "name"=>"MOSIRO", "created_at"=>now()],
            //187_KAJIADO_SOUTH
            ["id"=>931,	"county_id"=>34, "sub_county_id"=>187, "name"=>"ENTONET/LENKISIM", "created_at"=>now()],
            ["id"=>932,	"county_id"=>34, "sub_county_id"=>187, "name"=>"MBIRIKANI/ESELENKEI", "created_at"=>now()],
            ["id"=>933,	"county_id"=>34, "sub_county_id"=>187, "name"=>"KUKU", "created_at"=>now()],
            ["id"=>934,	"county_id"=>34, "sub_county_id"=>187, "name"=>"ROMBO", "created_at"=>now()],
            ["id"=>935,	"county_id"=>34, "sub_county_id"=>187, "name"=>"KIMANA", "created_at"=>now()],


            //35_Kericho
            //188_KIPKELION_EAST
            ["id"=>936,	"county_id"=>35, "sub_county_id"=>188, "name"=>"LONDIANI", "created_at"=>now()],
            ["id"=>937,	"county_id"=>35, "sub_county_id"=>188, "name"=>"KEDOWA/KIMUGUL", "created_at"=>now()],
            ["id"=>938,	"county_id"=>35, "sub_county_id"=>188, "name"=>"CHEPSEON", "created_at"=>now()],
            ["id"=>939,	"county_id"=>35, "sub_county_id"=>188, "name"=>"TENDENO/SORGET", "created_at"=>now()],
            //189_KIPKELION_WEST
            ["id"=>940,	"county_id"=>35, "sub_county_id"=>189, "name"=>"KUNYAK", "created_at"=>now()],
            ["id"=>941,	"county_id"=>35, "sub_county_id"=>189, "name"=>"KAMASIAN", "created_at"=>now()],
            ["id"=>942,	"county_id"=>35, "sub_county_id"=>189, "name"=>"KIPKELION", "created_at"=>now()],
            ["id"=>943,	"county_id"=>35, "sub_county_id"=>189, "name"=>"CHILCHILA", "created_at"=>now()],
            //190_AINAMOI
            ["id"=>944,	"county_id"=>35, "sub_county_id"=>190, "name"=>"KAPSOIT", "created_at"=>now()],
            ["id"=>945,	"county_id"=>35, "sub_county_id"=>190, "name"=>"AINAMOI", "created_at"=>now()],
            ["id"=>946,	"county_id"=>35, "sub_county_id"=>190, "name"=>"KAPKUGERWET", "created_at"=>now()],
            ["id"=>947,	"county_id"=>35, "sub_county_id"=>190, "name"=>"KIPCHEBOR", "created_at"=>now()],
            ["id"=>948,	"county_id"=>35, "sub_county_id"=>190, "name"=>"KIPCHIMCHIM", "created_at"=>now()],
            ["id"=>949,	"county_id"=>35, "sub_county_id"=>190, "name"=>"KAPSAOS", "created_at"=>now()],
            //191_BURETI
            ["id"=>950,	"county_id"=>35, "sub_county_id"=>191, "name"=>"KISIARA", "created_at"=>now()],
            ["id"=>951,	"county_id"=>35, "sub_county_id"=>191, "name"=>"TEBESONIK", "created_at"=>now()],
            ["id"=>952,	"county_id"=>35, "sub_county_id"=>191, "name"=>"CHEBOIN", "created_at"=>now()],
            ["id"=>953,	"county_id"=>35, "sub_county_id"=>191, "name"=>"CHEMOSOT", "created_at"=>now()],
            ["id"=>954,	"county_id"=>35, "sub_county_id"=>191, "name"=>"LITEIN", "created_at"=>now()],
            ["id"=>955,	"county_id"=>35, "sub_county_id"=>191, "name"=>"CHEPLANGET", "created_at"=>now()],
            ["id"=>956,	"county_id"=>35, "sub_county_id"=>191, "name"=>"KAPKATET", "created_at"=>now()],
            //192_BELGUT
            ["id"=>957,	"county_id"=>35, "sub_county_id"=>192, "name"=>"WALDAI", "created_at"=>now()],
            ["id"=>958,	"county_id"=>35, "sub_county_id"=>192, "name"=>"KABIANGA", "created_at"=>now()],
            ["id"=>959,	"county_id"=>35, "sub_county_id"=>192, "name"=>"CHEPTORORIET/SERETUT", "created_at"=>now()],
            ["id"=>960,	"county_id"=>35, "sub_county_id"=>192, "name"=>"CHAIK", "created_at"=>now()],
            ["id"=>961,	"county_id"=>35, "sub_county_id"=>192, "name"=>"KAPSUSER", "created_at"=>now()],
            //193_SIGOWET/SOIN
            ["id"=>962,	"county_id"=>35, "sub_county_id"=>193, "name"=>"SIGOWET", "created_at"=>now()],
            ["id"=>963,	"county_id"=>35, "sub_county_id"=>193, "name"=>"KAPLELARTET", "created_at"=>now()],
            ["id"=>964,	"county_id"=>35, "sub_county_id"=>193, "name"=>"SOLIAT", "created_at"=>now()],
            ["id"=>965,	"county_id"=>35, "sub_county_id"=>193, "name"=>"SOIN", "created_at"=>now()],


            //36_Bomet
            //194_SOTIK
            ["id"=>966,	"county_id"=>36, "sub_county_id"=>194, "name"=>"NDANAI/ABOSI", "created_at"=>now()],
            ["id"=>967,	"county_id"=>36, "sub_county_id"=>194, "name"=>"CHEMAGEL", "created_at"=>now()],
            ["id"=>968,	"county_id"=>36, "sub_county_id"=>194, "name"=>"KIPSONOI", "created_at"=>now()],
            ["id"=>969,	"county_id"=>36, "sub_county_id"=>194, "name"=>"KAPLETUNDO", "created_at"=>now()],
            ["id"=>970,	"county_id"=>36, "sub_county_id"=>194, "name"=>"RONGENA/MANARET", "created_at"=>now()],
            //195_CHEPALUNGU
            ["id"=>971,	"county_id"=>36, "sub_county_id"=>195, "name"=>"KONG'ASIS", "created_at"=>now()],
            ["id"=>972,	"county_id"=>36, "sub_county_id"=>195, "name"=>"NYANGORES", "created_at"=>now()],
            ["id"=>973,	"county_id"=>36, "sub_county_id"=>195, "name"=>"SIGOR", "created_at"=>now()],
            ["id"=>974,	"county_id"=>36, "sub_county_id"=>195, "name"=>"CHEBUNYO", "created_at"=>now()],
            ["id"=>975,	"county_id"=>36, "sub_county_id"=>195, "name"=>"SIONGIROI", "created_at"=>now()],
            //196_BOMET_EAST
            ["id"=>976,	"county_id"=>36, "sub_county_id"=>196, "name"=>"MERIGI", "created_at"=>now()],
            ["id"=>977,	"county_id"=>36, "sub_county_id"=>196, "name"=>"KEMBU", "created_at"=>now()],
            ["id"=>978,	"county_id"=>36, "sub_county_id"=>196, "name"=>"LONGISA", "created_at"=>now()],
            ["id"=>979,	"county_id"=>36, "sub_county_id"=>196, "name"=>"KIPRERES", "created_at"=>now()],
            ["id"=>980,	"county_id"=>36, "sub_county_id"=>196, "name"=>"CHEMANER", "created_at"=>now()],
            //197_BOMET_CENTRAL
            ["id"=>981,	"county_id"=>36, "sub_county_id"=>197, "name"=>"SILIBWET TOWNSHIP", "created_at"=>now()],
            ["id"=>982,	"county_id"=>36, "sub_county_id"=>197, "name"=>"NDARAWETA", "created_at"=>now()],
            ["id"=>983,	"county_id"=>36, "sub_county_id"=>197, "name"=>"SINGORWET", "created_at"=>now()],
            ["id"=>984,	"county_id"=>36, "sub_county_id"=>197, "name"=>"CHESOEN", "created_at"=>now()],
            ["id"=>985,	"county_id"=>36, "sub_county_id"=>197, "name"=>"MUTARAKWA", "created_at"=>now()],
            //198_KONOIN
            ["id"=>986,	"county_id"=>36, "sub_county_id"=>198, "name"=>"CHEPCHABAS", "created_at"=>now()],
            ["id"=>987,	"county_id"=>36, "sub_county_id"=>198, "name"=>"KIMULOT", "created_at"=>now()],
            ["id"=>988,	"county_id"=>36, "sub_county_id"=>198, "name"=>"MOGOGOSIEK", "created_at"=>now()],
            ["id"=>989,	"county_id"=>36, "sub_county_id"=>198, "name"=>"BOITO", "created_at"=>now()],
            ["id"=>990,	"county_id"=>36, "sub_county_id"=>198, "name"=>"EMBOMOS", "created_at"=>now()],


            //37_Kakamega
            //199_LUGARI
            ["id"=> 991, "county_id"=>37, "sub_county_id"=>199, "name"=>"MAUTUMA", "created_at"=>now()],
            ["id"=> 992, "county_id"=>37, "sub_county_id"=>199, "name"=>"LUGARI", "created_at"=>now()],
            ["id"=> 993, "county_id"=>37, "sub_county_id"=>199, "name"=>"LUMAKANDA", "created_at"=>now()],
            ["id"=> 994, "county_id"=>37, "sub_county_id"=>199, "name"=>"CHEKALINI", "created_at"=>now()],
            ["id"=> 995, "county_id"=>37, "sub_county_id"=>199, "name"=>"CHEVAYWA", "created_at"=>now()],
            ["id"=> 996, "county_id"=>37, "sub_county_id"=>199, "name"=>"LWANDETI", "created_at"=>now()],
            //200_LIKUYANI
            ["id"=> 997, "county_id"=>37, "sub_county_id"=>200, "name"=>"LIKUYANI", "created_at"=>now()],
            ["id"=> 998, "county_id"=>37, "sub_county_id"=>200, "name"=>"SANGO", "created_at"=>now()],
            ["id"=> 999, "county_id"=>37, "sub_county_id"=>200, "name"=>"KONGONI", "created_at"=>now()],
            ["id"=>1000, "county_id"=>37, "sub_county_id"=>200, "name"=>"NZOIA", "created_at"=>now()],
            ["id"=>1001, "county_id"=>37, "sub_county_id"=>200, "name"=>"SINOKO", "created_at"=>now()],
            //201_MALAVA
            ["id"=>1002, "county_id"=>37, "sub_county_id"=>201, "name"=>"WEST KABRAS", "created_at"=>now()],
            ["id"=>1003, "county_id"=>37, "sub_county_id"=>201, "name"=>"CHEMUCHE", "created_at"=>now()],
            ["id"=>1004, "county_id"=>37, "sub_county_id"=>201, "name"=>"EAST KABRAS", "created_at"=>now()],
            ["id"=>1005, "county_id"=>37, "sub_county_id"=>201, "name"=>"BUTALI/CHEGULO", "created_at"=>now()],
            ["id"=>1006, "county_id"=>37, "sub_county_id"=>201, "name"=>"MANDA-SHIVANGA", "created_at"=>now()],
            ["id"=>1007, "county_id"=>37, "sub_county_id"=>201, "name"=>"SHIRUGU-MUGAI", "created_at"=>now()],
            ["id"=>1008, "county_id"=>37, "sub_county_id"=>201, "name"=>"SOUTH KABRAS", "created_at"=>now()],
            //202_LURAMBI
            ["id"=>1009, "county_id"=>37, "sub_county_id"=>202, "name"=>"BUTSOTSO EAST", "created_at"=>now()],
            ["id"=>1010, "county_id"=>37, "sub_county_id"=>202, "name"=>"BUTSOTSO SOUTH", "created_at"=>now()],
            ["id"=>1011, "county_id"=>37, "sub_county_id"=>202, "name"=>"BUTSOTSO CENTRAL", "created_at"=>now()],
            ["id"=>1012, "county_id"=>37, "sub_county_id"=>202, "name"=>"SHEYWE", "created_at"=>now()],
            ["id"=>1013, "county_id"=>37, "sub_county_id"=>202, "name"=>"MAHIAKALO", "created_at"=>now()],
            ["id"=>1014, "county_id"=>37, "sub_county_id"=>202, "name"=>"SHIRERE", "created_at"=>now()],
            //203_NAVAKHOLO
            ["id"=>1015, "county_id"=>37, "sub_county_id"=>203, "name"=>"INGOSTSE-MATHIA", "created_at"=>now()],
            ["id"=>1016, "county_id"=>37, "sub_county_id"=>203, "name"=>"SHINOYI-SHIKOMARI-ESUMEYIA", "created_at"=>now()],
            ["id"=>1017, "county_id"=>37, "sub_county_id"=>203, "name"=>"BUNYALA WEST", "created_at"=>now()],
            ["id"=>1018, "county_id"=>37, "sub_county_id"=>203, "name"=>"BUNYALA EAST", "created_at"=>now()],
            ["id"=>1019, "county_id"=>37, "sub_county_id"=>203, "name"=>"BUNYALA CENTRAL", "created_at"=>now()],
            //204_MUMIAS_WEST
            ["id"=>1020, "county_id"=>37, "sub_county_id"=>204, "name"=>"MUMIAS CENTRAL", "created_at"=>now()],
            ["id"=>1021, "county_id"=>37, "sub_county_id"=>204, "name"=>"MUMIAS NORTH", "created_at"=>now()],
            ["id"=>1022, "county_id"=>37, "sub_county_id"=>204, "name"=>"ETENJE", "created_at"=>now()],
            ["id"=>1023, "county_id"=>37, "sub_county_id"=>204, "name"=>"MUSANDA", "created_at"=>now()],
            //205_MUMIAS_EAST
            ["id"=>1024, "county_id"=>37, "sub_county_id"=>205, "name"=>"LUSHEYA/LUBINU", "created_at"=>now()],
            ["id"=>1025, "county_id"=>37, "sub_county_id"=>205, "name"=>"MALAHA/ISONGO/MAKUNGA", "created_at"=>now()],
            ["id"=>1026, "county_id"=>37, "sub_county_id"=>205, "name"=>"EAST WANGA", "created_at"=>now()],
            //206_MATUNGU
            ["id"=>1027, "county_id"=>37, "sub_county_id"=>206, "name"=>"KOYONZO", "created_at"=>now()],
            ["id"=>1028, "county_id"=>37, "sub_county_id"=>206, "name"=>"KHOLERA", "created_at"=>now()],
            ["id"=>1029, "county_id"=>37, "sub_county_id"=>206, "name"=>"KHALABA", "created_at"=>now()],
            ["id"=>1030, "county_id"=>37, "sub_county_id"=>206, "name"=>"MAYONI", "created_at"=>now()],
            ["id"=>1031, "county_id"=>37, "sub_county_id"=>206, "name"=>"NAMAMALI", "created_at"=>now()],
            //207_BUTERE
            ["id"=>1032, "county_id"=>37, "sub_county_id"=>207, "name"=>"MARAMA WEST", "created_at"=>now()],
            ["id"=>1033, "county_id"=>37, "sub_county_id"=>207, "name"=>"MARAMA CENTRAL", "created_at"=>now()],
            ["id"=>1034, "county_id"=>37, "sub_county_id"=>207, "name"=>"MARENYO - SHIANDA", "created_at"=>now()],
            ["id"=>1035, "county_id"=>37, "sub_county_id"=>207, "name"=>"MARAMA NORTH", "created_at"=>now()],
            ["id"=>1036, "county_id"=>37, "sub_county_id"=>207, "name"=>"MARAMA SOUTH", "created_at"=>now()],
            //208_KHWISERO
            ["id"=>1037, "county_id"=>37, "sub_county_id"=>208, "name"=>"KISA NORTH", "created_at"=>now()],
            ["id"=>1038, "county_id"=>37, "sub_county_id"=>208, "name"=>"KISA EAST", "created_at"=>now()],
            ["id"=>1039, "county_id"=>37, "sub_county_id"=>208, "name"=>"KISA WEST", "created_at"=>now()],
            ["id"=>1040, "county_id"=>37, "sub_county_id"=>208, "name"=>"KISA CENTRAL", "created_at"=>now()],
            //209_SHINYALU
            ["id"=>1041, "county_id"=>37, "sub_county_id"=>209, "name"=>"ISUKHA NORTH", "created_at"=>now()],
            ["id"=>1042, "county_id"=>37, "sub_county_id"=>209, "name"=>"MURHANDA", "created_at"=>now()],
            ["id"=>1043, "county_id"=>37, "sub_county_id"=>209, "name"=>"ISUKHA CENTRAL", "created_at"=>now()],
            ["id"=>1044, "county_id"=>37, "sub_county_id"=>209, "name"=>"ISUKHA SOUTH", "created_at"=>now()],
            ["id"=>1045, "county_id"=>37, "sub_county_id"=>209, "name"=>"ISUKHA EAST", "created_at"=>now()],
            ["id"=>1046, "county_id"=>37, "sub_county_id"=>209, "name"=>"ISUKHA WEST", "created_at"=>now()],
            //210_IKOLOMANI
            ["id"=>1047, "county_id"=>37, "sub_county_id"=>210, "name"=>"IDAKHO SOUTH", "created_at"=>now()],
            ["id"=>1048, "county_id"=>37, "sub_county_id"=>210, "name"=>"IDAKHO EAST", "created_at"=>now()],
            ["id"=>1049, "county_id"=>37, "sub_county_id"=>210, "name"=>"IDAKHO NORTH", "created_at"=>now()],
            ["id"=>1050, "county_id"=>37, "sub_county_id"=>210, "name"=>"IDAKHO CENTRAL", "created_at"=>now()],


            //38_Vihiga
            //211_VIHIGA
            ["id"=>1051, "county_id"=>38, "sub_county_id"=>211, "name"=>"LUGAGA-WAMULUMA", "created_at"=>now()],
            ["id"=>1052, "county_id"=>38, "sub_county_id"=>211, "name"=>"SOUTH MARAGOLI", "created_at"=>now()],
            ["id"=>1053, "county_id"=>38, "sub_county_id"=>211, "name"=>"CENTRAL MARAGOLI", "created_at"=>now()],
            //212_SABATIA
            ["id"=>1054, "county_id"=>38, "sub_county_id"=>212, "name"=>"MUNGOMA", "created_at"=>now()],
            ["id"=>1055, "county_id"=>38, "sub_county_id"=>212, "name"=>"LYADUYWA/IZAVA", "created_at"=>now()],
            ["id"=>1056, "county_id"=>38, "sub_county_id"=>212, "name"=>"WEST SABATIA", "created_at"=>now()],
            ["id"=>1057, "county_id"=>38, "sub_county_id"=>212, "name"=>"CHAVAKALI", "created_at"=>now()],
            ["id"=>1058, "county_id"=>38, "sub_county_id"=>212, "name"=>"NORTH MARAGOLI", "created_at"=>now()],
            ["id"=>1059, "county_id"=>38, "sub_county_id"=>212, "name"=>"WODANGA", "created_at"=>now()],
            ["id"=>1060, "county_id"=>38, "sub_county_id"=>212, "name"=>"BUSALI", "created_at"=>now()],
            //213_HAMISI
            ["id"=>1061, "county_id"=>38, "sub_county_id"=>213, "name"=>"SHIRU", "created_at"=>now()],
            ["id"=>1062, "county_id"=>38, "sub_county_id"=>213, "name"=>"GISAMBAI", "created_at"=>now()],
            ["id"=>1063, "county_id"=>38, "sub_county_id"=>213, "name"=>"SHAMAKHOKHO", "created_at"=>now()],
            ["id"=>1064, "county_id"=>38, "sub_county_id"=>213, "name"=>"BANJA", "created_at"=>now()],
            ["id"=>1065, "county_id"=>38, "sub_county_id"=>213, "name"=>"MUHUDU", "created_at"=>now()],
            ["id"=>1066, "county_id"=>38, "sub_county_id"=>213, "name"=>"TAMBUA", "created_at"=>now()],
            ["id"=>1067, "county_id"=>38, "sub_county_id"=>213, "name"=>"JEPKOYAI", "created_at"=>now()],
            //214_LUANDA
            ["id"=>1068, "county_id"=>38, "sub_county_id"=>214, "name"=>"LUANDA TOWNSHIP", "created_at"=>now()],
            ["id"=>1069, "county_id"=>38, "sub_county_id"=>214, "name"=>"WEMILABI", "created_at"=>now()],
            ["id"=>1070, "county_id"=>38, "sub_county_id"=>214, "name"=>"MWIBONA", "created_at"=>now()],
            ["id"=>1071, "county_id"=>38, "sub_county_id"=>214, "name"=>"LUANDA SOUTH", "created_at"=>now()],
            ["id"=>1072, "county_id"=>38, "sub_county_id"=>214, "name"=>"EMABUNGO", "created_at"=>now()],
            //215_EMUHAYA
            ["id"=>1073, "county_id"=>38, "sub_county_id"=>215, "name"=>"NORTH EAST BUNYORE", "created_at"=>now()],
            ["id"=>1074, "county_id"=>38, "sub_county_id"=>215, "name"=>"CENTRAL BUNYORE", "created_at"=>now()],
            ["id"=>1075, "county_id"=>38, "sub_county_id"=>215, "name"=>"WEST BUNYORE", "created_at"=>now()],


            //39_Bungoma
            //216_MT.ELGON
            ["id"=>1076, "county_id"=>39, "sub_county_id"=>216, "name"=>"CHEPTAIS", "created_at"=>now()],
            ["id"=>1077, "county_id"=>39, "sub_county_id"=>216, "name"=>"CHESIKAKI", "created_at"=>now()],
            ["id"=>1078, "county_id"=>39, "sub_county_id"=>216, "name"=>"CHEPYUK", "created_at"=>now()],
            ["id"=>1079, "county_id"=>39, "sub_county_id"=>216, "name"=>"KAPKATENY", "created_at"=>now()],
            ["id"=>1080, "county_id"=>39, "sub_county_id"=>216, "name"=>"KAPTAMA", "created_at"=>now()],
            ["id"=>1081, "county_id"=>39, "sub_county_id"=>216, "name"=>"ELGON", "created_at"=>now()],
            //217_SIRISIA
            ["id"=>1082, "county_id"=>39, "sub_county_id"=>217, "name"=>"NAMWELA", "created_at"=>now()],
            ["id"=>1083, "county_id"=>39, "sub_county_id"=>217, "name"=>"MALAKISI/SOUTH KULISIRU", "created_at"=>now()],
            ["id"=>1084, "county_id"=>39, "sub_county_id"=>217, "name"=>"LWANDANYI", "created_at"=>now()],
            //218_KABUCHAI
            ["id"=>1085, "county_id"=>39, "sub_county_id"=>218, "name"=>"KABUCHAI/CHWELE", "created_at"=>now()],
            ["id"=>1086, "county_id"=>39, "sub_county_id"=>218, "name"=>"WEST NALONDO", "created_at"=>now()],
            ["id"=>1087, "county_id"=>39, "sub_county_id"=>218, "name"=>"BWAKE/LUUYA", "created_at"=>now()],
            ["id"=>1088, "county_id"=>39, "sub_county_id"=>218, "name"=>"MUKUYUNI", "created_at"=>now()],
            //219_BUMULA
            ["id"=>1089, "county_id"=>39, "sub_county_id"=>219, "name"=>"SOUTH BUKUSU", "created_at"=>now()],
            ["id"=>1090, "county_id"=>39, "sub_county_id"=>219, "name"=>"BUMULA", "created_at"=>now()],
            ["id"=>1091, "county_id"=>39, "sub_county_id"=>219, "name"=>"KHASOKO", "created_at"=>now()],
            ["id"=>1092, "county_id"=>39, "sub_county_id"=>219, "name"=>"KABULA", "created_at"=>now()],
            ["id"=>1093, "county_id"=>39, "sub_county_id"=>219, "name"=>"KIMAETI", "created_at"=>now()],
            ["id"=>1094, "county_id"=>39, "sub_county_id"=>219, "name"=>"WEST BUKUSU", "created_at"=>now()],
            ["id"=>1095, "county_id"=>39, "sub_county_id"=>219, "name"=>"SIBOTI", "created_at"=>now()],
            //220_KANDUYI
            ["id"=>1096, "county_id"=>39, "sub_county_id"=>220, "name"=>"BUKEMBE WEST", "created_at"=>now()],
            ["id"=>1097, "county_id"=>39, "sub_county_id"=>220, "name"=>"BUKEMBE EAST", "created_at"=>now()],
            ["id"=>1098, "county_id"=>39, "sub_county_id"=>220, "name"=>"TOWNSHIP", "created_at"=>now()],
            ["id"=>1099, "county_id"=>39, "sub_county_id"=>220, "name"=>"KHALABA", "created_at"=>now()],
            ["id"=>1100, "county_id"=>39, "sub_county_id"=>220, "name"=>"MUSIKOMA", "created_at"=>now()],
            ["id"=>1101, "county_id"=>39, "sub_county_id"=>220, "name"=>"EAST SANG'ALO", "created_at"=>now()],
            ["id"=>1102, "county_id"=>39, "sub_county_id"=>220, "name"=>"MARAKARU/TUUTI", "created_at"=>now()],
            ["id"=>1103, "county_id"=>39, "sub_county_id"=>220, "name"=>"WEST SANG'ALO", "created_at"=>now()],
            //221_WEBUYE_EAST
            ["id"=>1104, "county_id"=>39, "sub_county_id"=>221, "name"=>"MIHUU", "created_at"=>now()],
            ["id"=>1105, "county_id"=>39, "sub_county_id"=>221, "name"=>"NDIVISI", "created_at"=>now()],
            ["id"=>1106, "county_id"=>39, "sub_county_id"=>221, "name"=>"MARAKA", "created_at"=>now()],
            //222_WEBUYE_WEST
            ["id"=>1107, "county_id"=>39, "sub_county_id"=>222, "name"=>"MISIKHU", "created_at"=>now()],
            ["id"=>1108, "county_id"=>39, "sub_county_id"=>222, "name"=>"SITIKHO", "created_at"=>now()],
            ["id"=>1109, "county_id"=>39, "sub_county_id"=>222, "name"=>"MATULO", "created_at"=>now()],
            ["id"=>1110, "county_id"=>39, "sub_county_id"=>222, "name"=>"BOKOLI", "created_at"=>now()],
            //223_KIMILILI
            ["id"=>1111, "county_id"=>39, "sub_county_id"=>223, "name"=>"KIBINGEI", "created_at"=>now()],
            ["id"=>1112, "county_id"=>39, "sub_county_id"=>223, "name"=>"KIMILILI", "created_at"=>now()],
            ["id"=>1113, "county_id"=>39, "sub_county_id"=>223, "name"=>"MAENI", "created_at"=>now()],
            ["id"=>1114, "county_id"=>39, "sub_county_id"=>223, "name"=>"KAMUKUYWA", "created_at"=>now()],
            //224_TONGAREN
            ["id"=>1115, "county_id"=>39, "sub_county_id"=>224, "name"=>"MBAKALO", "created_at"=>now()],
            ["id"=>1116, "county_id"=>39, "sub_county_id"=>224, "name"=>"NAITIRI/KABUYEFWE", "created_at"=>now()],
            ["id"=>1117, "county_id"=>39, "sub_county_id"=>224, "name"=>"MILIMA", "created_at"=>now()],
            ["id"=>1118, "county_id"=>39, "sub_county_id"=>224, "name"=>"NDALU/TABANI", "created_at"=>now()],
            ["id"=>1119, "county_id"=>39, "sub_county_id"=>224, "name"=>"TONGAREN", "created_at"=>now()],
            ["id"=>1120, "county_id"=>39, "sub_county_id"=>224, "name"=>"SOYSAMBU/MITUA", "created_at"=>now()],


            //40_Busia
            //225_TESO_NORTH
            ["id"=>1121, "county_id"=>40, "sub_county_id"=>225, "name"=>"MALABA CENTRAL", "created_at"=>now()],
            ["id"=>1122, "county_id"=>40, "sub_county_id"=>225, "name"=>"MALABA NORTH", "created_at"=>now()],
            ["id"=>1123, "county_id"=>40, "sub_county_id"=>225, "name"=>"ANG'URAI SOUTH", "created_at"=>now()],
            ["id"=>1124, "county_id"=>40, "sub_county_id"=>225, "name"=>"ANG'URAI NORTH", "created_at"=>now()],
            ["id"=>1125, "county_id"=>40, "sub_county_id"=>225, "name"=>"ANG'URAI EAST", "created_at"=>now()],
            ["id"=>1126, "county_id"=>40, "sub_county_id"=>225, "name"=>"MALABA SOUTH", "created_at"=>now()],
            //226_TESO_SOUTH
            ["id"=>1127, "county_id"=>40, "sub_county_id"=>226, "name"=>"ANG'OROM", "created_at"=>now()],
            ["id"=>1128, "county_id"=>40, "sub_county_id"=>226, "name"=>"CHAKOL SOUTH", "created_at"=>now()],
            ["id"=>1129, "county_id"=>40, "sub_county_id"=>226, "name"=>"CHAKOL NORTH", "created_at"=>now()],
            ["id"=>1130, "county_id"=>40, "sub_county_id"=>226, "name"=>"AMUKURA WEST", "created_at"=>now()],
            ["id"=>1131, "county_id"=>40, "sub_county_id"=>226, "name"=>"AMUKURA EAST", "created_at"=>now()],
            ["id"=>1132, "county_id"=>40, "sub_county_id"=>226, "name"=>"AMUKURA CENTRAL", "created_at"=>now()],
            //227_NAMBALE
            ["id"=>1133, "county_id"=>40, "sub_county_id"=>227, "name"=>"NAMBALE TOWNSHIP", "created_at"=>now()],
            ["id"=>1134, "county_id"=>40, "sub_county_id"=>227, "name"=>"BUKHAYO NORTH/WALTSI", "created_at"=>now()],
            ["id"=>1135, "county_id"=>40, "sub_county_id"=>227, "name"=>"BUKHAYO EAST", "created_at"=>now()],
            ["id"=>1136, "county_id"=>40, "sub_county_id"=>227, "name"=>"BUKHAYO CENTRAL", "created_at"=>now()],
            //228_MATAYOS
            ["id"=>1137, "county_id"=>40, "sub_county_id"=>228, "name"=>"BUKHAYO WEST", "created_at"=>now()],
            ["id"=>1138, "county_id"=>40, "sub_county_id"=>228, "name"=>"MAYENJE", "created_at"=>now()],
            ["id"=>1139, "county_id"=>40, "sub_county_id"=>228, "name"=>"MATAYOS SOUTH", "created_at"=>now()],
            ["id"=>1140, "county_id"=>40, "sub_county_id"=>228, "name"=>"BUSIBWABO", "created_at"=>now()],
            ["id"=>1141, "county_id"=>40, "sub_county_id"=>228, "name"=>"BURUMBA", "created_at"=>now()],
            //229_BUTULA
            ["id"=>1142, "county_id"=>40, "sub_county_id"=>229, "name"=>"MARACHI WEST", "created_at"=>now()],
            ["id"=>1143, "county_id"=>40, "sub_county_id"=>229, "name"=>"KINGANDOLE", "created_at"=>now()],
            ["id"=>1144, "county_id"=>40, "sub_county_id"=>229, "name"=>"MARACHI CENTRAL", "created_at"=>now()],
            ["id"=>1145, "county_id"=>40, "sub_county_id"=>229, "name"=>"MARACHI EAST", "created_at"=>now()],
            ["id"=>1146, "county_id"=>40, "sub_county_id"=>229, "name"=>"MARACHI NORTH", "created_at"=>now()],
            ["id"=>1147, "county_id"=>40, "sub_county_id"=>229, "name"=>"ELUGULU", "created_at"=>now()],
            //230_FUNYULA
            ["id"=>1148, "county_id"=>40, "sub_county_id"=>230, "name"=>"NAMBOBOTO NAMBUKU", "created_at"=>now()],
            ["id"=>1149, "county_id"=>40, "sub_county_id"=>230, "name"=>"NANGINA", "created_at"=>now()],
            ["id"=>1150, "county_id"=>40, "sub_county_id"=>230, "name"=>"AGENG'A NANGUBA", "created_at"=>now()],
            ["id"=>1151, "county_id"=>40, "sub_county_id"=>230, "name"=>"BWIRI", "created_at"=>now()],
            //231_BUDALANGI
            ["id"=>1152, "county_id"=>40, "sub_county_id"=>231, "name"=>"BUNYALA CENTRAL", "created_at"=>now()],
            ["id"=>1153, "county_id"=>40, "sub_county_id"=>231, "name"=>"BUNYALA NORTH", "created_at"=>now()],
            ["id"=>1154, "county_id"=>40, "sub_county_id"=>231, "name"=>"BUNYALA WEST", "created_at"=>now()],
            ["id"=>1155, "county_id"=>40, "sub_county_id"=>231, "name"=>"BUNYALA SOUTH", "created_at"=>now()],


            //41_Siaya
            //232_UGENYA
            ["id"=>1156, "county_id"=>41, "sub_county_id"=>232, "name"=>"WEST UGENYA", "created_at"=>now()],
            ["id"=>1157, "county_id"=>41, "sub_county_id"=>232, "name"=>"UKWALA", "created_at"=>now()],
            ["id"=>1158, "county_id"=>41, "sub_county_id"=>232, "name"=>"NORTH UGENYA", "created_at"=>now()],
            ["id"=>1159, "county_id"=>41, "sub_county_id"=>232, "name"=>"EAST UGENYA", "created_at"=>now()],
            //233_UGUNJA
            ["id"=>1160, "county_id"=>41, "sub_county_id"=>233, "name"=>"SIDINDI", "created_at"=>now()],
            ["id"=>1161, "county_id"=>41, "sub_county_id"=>233, "name"=>"SIGOMERE", "created_at"=>now()],
            ["id"=>1162, "county_id"=>41, "sub_county_id"=>233, "name"=>"UGUNJA", "created_at"=>now()],
            //234_ALEGO_USONGA
            ["id"=>1163, "county_id"=>41, "sub_county_id"=>234, "name"=>"USONGA", "created_at"=>now()],
            ["id"=>1164, "county_id"=>41, "sub_county_id"=>234, "name"=>"WEST ALEGO", "created_at"=>now()],
            ["id"=>1165, "county_id"=>41, "sub_county_id"=>234, "name"=>"CENTRAL ALEGO", "created_at"=>now()],
            ["id"=>1166, "county_id"=>41, "sub_county_id"=>234, "name"=>"SIAYA TOWNSHIP", "created_at"=>now()],
            ["id"=>1167, "county_id"=>41, "sub_county_id"=>234, "name"=>"NORTH ALEGO", "created_at"=>now()],
            ["id"=>1168, "county_id"=>41, "sub_county_id"=>234, "name"=>"SOUTH EAST ALEGO", "created_at"=>now()],
            //235_GEM
            ["id"=>1169, "county_id"=>41, "sub_county_id"=>235, "name"=>"NORTH GEM", "created_at"=>now()],
            ["id"=>1170, "county_id"=>41, "sub_county_id"=>235, "name"=>"WEST GEM", "created_at"=>now()],
            ["id"=>1171, "county_id"=>41, "sub_county_id"=>235, "name"=>"CENTRAL GEM", "created_at"=>now()],
            ["id"=>1172, "county_id"=>41, "sub_county_id"=>235, "name"=>"YALA TOWNSHIP", "created_at"=>now()],
            ["id"=>1173, "county_id"=>41, "sub_county_id"=>235, "name"=>"EAST GEM", "created_at"=>now()],
            ["id"=>1174, "county_id"=>41, "sub_county_id"=>235, "name"=>"SOUTH GEM", "created_at"=>now()],
            //236_BONDO
            ["id"=>1175, "county_id"=>41, "sub_county_id"=>236, "name"=>"WEST YIMBO", "created_at"=>now()],
            ["id"=>1176, "county_id"=>41, "sub_county_id"=>236, "name"=>"CENTRAL SAKWA", "created_at"=>now()],
            ["id"=>1177, "county_id"=>41, "sub_county_id"=>236, "name"=>"SOUTH SAKWA", "created_at"=>now()],
            ["id"=>1178, "county_id"=>41, "sub_county_id"=>236, "name"=>"YIMBO EAST", "created_at"=>now()],
            ["id"=>1179, "county_id"=>41, "sub_county_id"=>236, "name"=>"WEST SAKWA", "created_at"=>now()],
            ["id"=>1180, "county_id"=>41, "sub_county_id"=>236, "name"=>"NORTH SAKWA", "created_at"=>now()],
            //237_RARIEDA
            ["id"=>1181, "county_id"=>41, "sub_county_id"=>237, "name"=>"EAST ASEMBO", "created_at"=>now()],
            ["id"=>1182, "county_id"=>41, "sub_county_id"=>237, "name"=>"WEST ASEMBO", "created_at"=>now()],
            ["id"=>1183, "county_id"=>41, "sub_county_id"=>237, "name"=>"NORTH UYOMA", "created_at"=>now()],
            ["id"=>1184, "county_id"=>41, "sub_county_id"=>237, "name"=>"SOUTH UYOMA", "created_at"=>now()],
            ["id"=>1185, "county_id"=>41, "sub_county_id"=>237, "name"=>"WEST UYOMA", "created_at"=>now()],


            //42_Kisumu
            //238_KISUMU_EAST
            ["id"=>1186, "county_id"=>42, "sub_county_id"=>238, "name"=>"KAJULU", "created_at"=>now()],
            ["id"=>1187, "county_id"=>42, "sub_county_id"=>238, "name"=>"KOLWA EAST", "created_at"=>now()],
            ["id"=>1188, "county_id"=>42, "sub_county_id"=>238, "name"=>"MANYATTA 'B'", "created_at"=>now()],
            ["id"=>1189, "county_id"=>42, "sub_county_id"=>238, "name"=>"NYALENDA 'A'", "created_at"=>now()],
            ["id"=>1190, "county_id"=>42, "sub_county_id"=>238, "name"=>"KOLWA CENTRAL", "created_at"=>now()],
            //239_KISUMU_WEST
            ["id"=>1191, "county_id"=>42, "sub_county_id"=>239, "name"=>"SOUTH WEST KISUMU", "created_at"=>now()],
            ["id"=>1192, "county_id"=>42, "sub_county_id"=>239, "name"=>"CENTRAL KISUMU", "created_at"=>now()],
            ["id"=>1193, "county_id"=>42, "sub_county_id"=>239, "name"=>"KISUMU NORTH", "created_at"=>now()],
            ["id"=>1194, "county_id"=>42, "sub_county_id"=>239, "name"=>"WEST KISUMU", "created_at"=>now()],
            ["id"=>1195, "county_id"=>42, "sub_county_id"=>239, "name"=>"NORTH WEST KISUMU", "created_at"=>now()],
            //240_KISUMU_CENTRAL
            ["id"=>1196, "county_id"=>42, "sub_county_id"=>240, "name"=>"RAILWAYS", "created_at"=>now()],
            ["id"=>1197, "county_id"=>42, "sub_county_id"=>240, "name"=>"MIGOSI", "created_at"=>now()],
            ["id"=>1198, "county_id"=>42, "sub_county_id"=>240, "name"=>"SHAURIMOYO KALOLENI", "created_at"=>now()],
            ["id"=>1199, "county_id"=>42, "sub_county_id"=>240, "name"=>"MARKET MILIMANI", "created_at"=>now()],
            ["id"=>1200, "county_id"=>42, "sub_county_id"=>240, "name"=>"KONDELE", "created_at"=>now()],
            ["id"=>1201, "county_id"=>42, "sub_county_id"=>240, "name"=>"NYALENDA B", "created_at"=>now()],
            //241_SEME
            ["id"=>1202, "county_id"=>42, "sub_county_id"=>241, "name"=>"WEST SEME", "created_at"=>now()],
            ["id"=>1203, "county_id"=>42, "sub_county_id"=>241, "name"=>"CENTRAL SEME", "created_at"=>now()],
            ["id"=>1204, "county_id"=>42, "sub_county_id"=>241, "name"=>"EAST SEME", "created_at"=>now()],
            ["id"=>1205, "county_id"=>42, "sub_county_id"=>241, "name"=>"NORTH SEME", "created_at"=>now()],
            //242_NYANDO
            ["id"=>1206, "county_id"=>42, "sub_county_id"=>242, "name"=>"EAST KANO/WAWIDHI", "created_at"=>now()],
            ["id"=>1207, "county_id"=>42, "sub_county_id"=>242, "name"=>"AWASI/ONJIKO", "created_at"=>now()],
            ["id"=>1208, "county_id"=>42, "sub_county_id"=>242, "name"=>"AHERO", "created_at"=>now()],
            ["id"=>1209, "county_id"=>42, "sub_county_id"=>242, "name"=>"KABONYO/KANYAGWAL", "created_at"=>now()],
            ["id"=>1210, "county_id"=>42, "sub_county_id"=>242, "name"=>"KOBURA", "created_at"=>now()],
            //243_MUHORONI
            ["id"=>1211, "county_id"=>42, "sub_county_id"=>243, "name"=>"MIWANI", "created_at"=>now()],
            ["id"=>1212, "county_id"=>42, "sub_county_id"=>243, "name"=>"OMBEYI", "created_at"=>now()],
            ["id"=>1213, "county_id"=>42, "sub_county_id"=>243, "name"=>"MASOGO/NYANG'OMA", "created_at"=>now()],
            ["id"=>1214, "county_id"=>42, "sub_county_id"=>243, "name"=>"CHEMELIL", "created_at"=>now()],
            ["id"=>1215, "county_id"=>42, "sub_county_id"=>243, "name"=>"MUHORONI/KORU", "created_at"=>now()],
            //244_NYAKACH
            ["id"=>1216, "county_id"=>42, "sub_county_id"=>244, "name"=>"SOUTH WEST NYAKACH", "created_at"=>now()],
            ["id"=>1217, "county_id"=>42, "sub_county_id"=>244, "name"=>"NORTH NYAKACH", "created_at"=>now()],
            ["id"=>1218, "county_id"=>42, "sub_county_id"=>244, "name"=>"CENTRAL NYAKACH", "created_at"=>now()],
            ["id"=>1219, "county_id"=>42, "sub_county_id"=>244, "name"=>"WEST NYAKACH", "created_at"=>now()],
            ["id"=>1220, "county_id"=>42, "sub_county_id"=>244, "name"=>"SOUTH EAST NYAKACH", "created_at"=>now()],


            //43_HomaBay
            //245_KASIPUL
            ["id"=>1221, "county_id"=>43, "sub_county_id"=>245, "name"=>"WEST KASIPUL", "created_at"=>now()],
            ["id"=>1222, "county_id"=>43, "sub_county_id"=>245, "name"=>"SOUTH KASIPUL", "created_at"=>now()],
            ["id"=>1223, "county_id"=>43, "sub_county_id"=>245, "name"=>"CENTRAL KASIPUL", "created_at"=>now()],
            ["id"=>1224, "county_id"=>43, "sub_county_id"=>245, "name"=>"EAST KAMAGAK", "created_at"=>now()],
            ["id"=>1225, "county_id"=>43, "sub_county_id"=>245, "name"=>"WEST KAMAGAK", "created_at"=>now()],
            //246_KABONDO_KASIPUL
            ["id"=>1226, "county_id"=>43, "sub_county_id"=>246, "name"=>"KABONDO EAST", "created_at"=>now()],
            ["id"=>1227, "county_id"=>43, "sub_county_id"=>246, "name"=>"KABONDO WEST", "created_at"=>now()],
            ["id"=>1228, "county_id"=>43, "sub_county_id"=>246, "name"=>"KOKWANYO/KAKELO", "created_at"=>now()],
            ["id"=>1229, "county_id"=>43, "sub_county_id"=>246, "name"=>"KOJWACH", "created_at"=>now()],
            //247_KARACHUONYO
            ["id"=>1230, "county_id"=>43, "sub_county_id"=>247, "name"=>"WEST KARACHUONYO", "created_at"=>now()],
            ["id"=>1231, "county_id"=>43, "sub_county_id"=>247, "name"=>"NORTH KARACHUONYO", "created_at"=>now()],
            ["id"=>1232, "county_id"=>43, "sub_county_id"=>247, "name"=>"CENTRAL", "created_at"=>now()],
            ["id"=>1233, "county_id"=>43, "sub_county_id"=>247, "name"=>"KANYALUO", "created_at"=>now()],
            ["id"=>1234, "county_id"=>43, "sub_county_id"=>247, "name"=>"KIBIRI", "created_at"=>now()],
            ["id"=>1235, "county_id"=>43, "sub_county_id"=>247, "name"=>"WANGCHIENG", "created_at"=>now()],
            ["id"=>1236, "county_id"=>43, "sub_county_id"=>247, "name"=>"KENDU BAY TOWN", "created_at"=>now()],
            //248_RANGWE
            ["id"=>1237, "county_id"=>43, "sub_county_id"=>248, "name"=>"WEST GEM", "created_at"=>now()],
            ["id"=>1238, "county_id"=>43, "sub_county_id"=>248, "name"=>"EAST GEM", "created_at"=>now()],
            ["id"=>1239, "county_id"=>43, "sub_county_id"=>248, "name"=>"KAGAN", "created_at"=>now()],
            ["id"=>1240, "county_id"=>43, "sub_county_id"=>248, "name"=>"KOCHIA", "created_at"=>now()],
            //249_HOMA_BAY_TOWN
            ["id"=>1241, "county_id"=>43, "sub_county_id"=>249, "name"=>"HOMA BAY CENTRAL", "created_at"=>now()],
            ["id"=>1242, "county_id"=>43, "sub_county_id"=>249, "name"=>"HOMA BAY ARUJO", "created_at"=>now()],
            ["id"=>1243, "county_id"=>43, "sub_county_id"=>249, "name"=>"HOMA BAY WEST", "created_at"=>now()],
            ["id"=>1244, "county_id"=>43, "sub_county_id"=>249, "name"=>"HOMA BAY EAST", "created_at"=>now()],
            //250_NDHIWA
            ["id"=>1245, "county_id"=>43, "sub_county_id"=>250, "name"=>"KWABWAI", "created_at"=>now()],
            ["id"=>1246, "county_id"=>43, "sub_county_id"=>250, "name"=>"KANYADOTO", "created_at"=>now()],
            ["id"=>1247, "county_id"=>43, "sub_county_id"=>250, "name"=>"KANYIKELA", "created_at"=>now()],
            ["id"=>1248, "county_id"=>43, "sub_county_id"=>250, "name"=>"KABUOCH NORTH", "created_at"=>now()],
            ["id"=>1249, "county_id"=>43, "sub_county_id"=>250, "name"=>"KABUOCH SOUTH/PALA", "created_at"=>now()],
            ["id"=>1250, "county_id"=>43, "sub_county_id"=>250, "name"=>"KANYAMWA KOLOGI", "created_at"=>now()],
            ["id"=>1251, "county_id"=>43, "sub_county_id"=>250, "name"=>"KANYAMWA KOSEWE", "created_at"=>now()],
            //251_SUBA_NORTH
            ["id"=>1252, "county_id"=>43, "sub_county_id"=>251, "name"=>"MFANGANO ISLAND", "created_at"=>now()],
            ["id"=>1253, "county_id"=>43, "sub_county_id"=>251, "name"=>"RUSINGA ISLAND", "created_at"=>now()],
            ["id"=>1254, "county_id"=>43, "sub_county_id"=>251, "name"=>"KASGUNGA", "created_at"=>now()],
            ["id"=>1255, "county_id"=>43, "sub_county_id"=>251, "name"=>"GEMBE", "created_at"=>now()],
            ["id"=>1256, "county_id"=>43, "sub_county_id"=>251, "name"=>"LAMBWE", "created_at"=>now()],
            //252_SUBA_SOUTH
            ["id"=>1257, "county_id"=>43, "sub_county_id"=>252, "name"=>"GWASSI SOUTH", "created_at"=>now()],
            ["id"=>1258, "county_id"=>43, "sub_county_id"=>252, "name"=>"GWASSI NORTH", "created_at"=>now()],
            ["id"=>1259, "county_id"=>43, "sub_county_id"=>252, "name"=>"KAKSINGRI WEST", "created_at"=>now()],
            ["id"=>1260, "county_id"=>43, "sub_county_id"=>252, "name"=>"RUMA-KAKSINGRI", "created_at"=>now()],


            //44_Migori
            //253_RONGO
            ["id"=>1261, "county_id"=>44, "sub_county_id"=>253, "name"=>"NORTH KAMAGAMBO", "created_at"=>now()],
            ["id"=>1262, "county_id"=>44, "sub_county_id"=>253, "name"=>"CENTRAL KAMAGAMBO", "created_at"=>now()],
            ["id"=>1263, "county_id"=>44, "sub_county_id"=>253, "name"=>"EAST KAMAGAMBO", "created_at"=>now()],
            ["id"=>1264, "county_id"=>44, "sub_county_id"=>253, "name"=>"SOUTH KAMAGAMBO", "created_at"=>now()],
            //254_AWENDO
            ["id"=>1265, "county_id"=>44, "sub_county_id"=>254, "name"=>"NORTH SAKWA", "created_at"=>now()],
            ["id"=>1266, "county_id"=>44, "sub_county_id"=>254, "name"=>"SOUTH SAKWA", "created_at"=>now()],
            ["id"=>1267, "county_id"=>44, "sub_county_id"=>254, "name"=>"WEST SAKWA", "created_at"=>now()],
            ["id"=>1268, "county_id"=>44, "sub_county_id"=>254, "name"=>"CENTRAL SAKWA", "created_at"=>now()],
            //255_SUNA_EAST
            ["id"=>1269, "county_id"=>44, "sub_county_id"=>255, "name"=>"GOD JOPE", "created_at"=>now()],
            ["id"=>1270, "county_id"=>44, "sub_county_id"=>255, "name"=>"SUNA CENTRAL", "created_at"=>now()],
            ["id"=>1271, "county_id"=>44, "sub_county_id"=>255, "name"=>"KAKRAO", "created_at"=>now()],
            ["id"=>1272, "county_id"=>44, "sub_county_id"=>255, "name"=>"KWA", "created_at"=>now()],
            //256_SUNA_WEST
            ["id"=>1273, "county_id"=>44, "sub_county_id"=>256, "name"=>"WIGA", "created_at"=>now()],
            ["id"=>1274, "county_id"=>44, "sub_county_id"=>256, "name"=>"WASWETA II", "created_at"=>now()],
            ["id"=>1275, "county_id"=>44, "sub_county_id"=>256, "name"=>"RAGANA-ORUBA", "created_at"=>now()],
            ["id"=>1276, "county_id"=>44, "sub_county_id"=>256, "name"=>"WASIMBETE", "created_at"=>now()],
            //257_URIRI
            ["id"=>1277, "county_id"=>44, "sub_county_id"=>257, "name"=>"WEST KANYAMKAGO", "created_at"=>now()],
            ["id"=>1278, "county_id"=>44, "sub_county_id"=>257, "name"=>"NORTH KANYAMKAGO", "created_at"=>now()],
            ["id"=>1279, "county_id"=>44, "sub_county_id"=>257, "name"=>"CENTRAL KANYAMKAGO", "created_at"=>now()],
            ["id"=>1280, "county_id"=>44, "sub_county_id"=>257, "name"=>"SOUTH KANYAMKAGO", "created_at"=>now()],
            ["id"=>1281, "county_id"=>44, "sub_county_id"=>257, "name"=>"EAST KANYAMKAGO", "created_at"=>now()],
            //258_NYATIKE
            ["id"=>1282, "county_id"=>44, "sub_county_id"=>258, "name"=>"KACHIEN'G", "created_at"=>now()],
            ["id"=>1283, "county_id"=>44, "sub_county_id"=>258, "name"=>"KANYASA", "created_at"=>now()],
            ["id"=>1284, "county_id"=>44, "sub_county_id"=>258, "name"=>"NORTH KADEM", "created_at"=>now()],
            ["id"=>1285, "county_id"=>44, "sub_county_id"=>258, "name"=>"MACALDER/KANYARWANDA", "created_at"=>now()],
            ["id"=>1286, "county_id"=>44, "sub_county_id"=>258, "name"=>"KALER", "created_at"=>now()],
            ["id"=>1287, "county_id"=>44, "sub_county_id"=>258, "name"=>"GOT KACHOLA", "created_at"=>now()],
            ["id"=>1288, "county_id"=>44, "sub_county_id"=>258, "name"=>"MUHURU", "created_at"=>now()],
            //259_KURIA_WEST
            ["id"=>1289, "county_id"=>44, "sub_county_id"=>259, "name"=>"BUKIRA EAST", "created_at"=>now()],
            ["id"=>1290, "county_id"=>44, "sub_county_id"=>259, "name"=>"BUKIRA CENTRL/IKEREGE", "created_at"=>now()],
            ["id"=>1291, "county_id"=>44, "sub_county_id"=>259, "name"=>"ISIBANIA", "created_at"=>now()],
            ["id"=>1292, "county_id"=>44, "sub_county_id"=>259, "name"=>"MAKERERO", "created_at"=>now()],
            ["id"=>1293, "county_id"=>44, "sub_county_id"=>259, "name"=>"MASABA", "created_at"=>now()],
            ["id"=>1294, "county_id"=>44, "sub_county_id"=>259, "name"=>"TAGARE", "created_at"=>now()],
            ["id"=>1295, "county_id"=>44, "sub_county_id"=>259, "name"=>"NYAMOSENSE/KOMOSOKO", "created_at"=>now()],
            //260_KURIA_EAST
            ["id"=>1296, "county_id"=>44, "sub_county_id"=>260, "name"=>"GOKEHARAKA/GETAMBWEGA", "created_at"=>now()],
            ["id"=>1297, "county_id"=>44, "sub_county_id"=>260, "name"=>"NTIMARU WEST", "created_at"=>now()],
            ["id"=>1298, "county_id"=>44, "sub_county_id"=>260, "name"=>"NTIMARU EAST", "created_at"=>now()],
            ["id"=>1299, "county_id"=>44, "sub_county_id"=>260, "name"=>"NYABASI EAST", "created_at"=>now()],
            ["id"=>1300, "county_id"=>44, "sub_county_id"=>260, "name"=>"NYABASI WEST", "created_at"=>now()],


            //45_Kisii
            //261_BONCHARI
            ["id"=>1301, "county_id"=>45, "sub_county_id"=>261, "name"=>"BOMARIBA", "created_at"=>now()],
            ["id"=>1302, "county_id"=>45, "sub_county_id"=>261, "name"=>"BOGIAKUMU", "created_at"=>now()],
            ["id"=>1303, "county_id"=>45, "sub_county_id"=>261, "name"=>"BOMORENDA", "created_at"=>now()],
            ["id"=>1304, "county_id"=>45, "sub_county_id"=>261, "name"=>"RIANA", "created_at"=>now()],
            //262_SOUTH_MUGIRANGO
            ["id"=>1305, "county_id"=>45, "sub_county_id"=>262, "name"=>"TABAKA", "created_at"=>now()],
            ["id"=>1306, "county_id"=>45, "sub_county_id"=>262, "name"=>"BOIKANG'A", "created_at"=>now()],
            ["id"=>1307, "county_id"=>45, "sub_county_id"=>262, "name"=>"BOGETENGA", "created_at"=>now()],
            ["id"=>1308, "county_id"=>45, "sub_county_id"=>262, "name"=>"BORABU/CHITAGO", "created_at"=>now()],
            ["id"=>1309, "county_id"=>45, "sub_county_id"=>262, "name"=>"MOTICHO", "created_at"=>now()],
            ["id"=>1310, "county_id"=>45, "sub_county_id"=>262, "name"=>"GETENGA", "created_at"=>now()],
            //263_BOMACHOGE_BORABU
            ["id"=>1311, "county_id"=>45, "sub_county_id"=>263, "name"=>"BOMBABA BORABU", "created_at"=>now()],
            ["id"=>1312, "county_id"=>45, "sub_county_id"=>263, "name"=>"BOOCHI BORABU", "created_at"=>now()],
            ["id"=>1313, "county_id"=>45, "sub_county_id"=>263, "name"=>"BOKIMONGE", "created_at"=>now()],
            ["id"=>1314, "county_id"=>45, "sub_county_id"=>263, "name"=>"MAGENCHE", "created_at"=>now()],
            //264_BOBASI
            ["id"=>1315, "county_id"=>45, "sub_county_id"=>264, "name"=>"MASIGE WEST", "created_at"=>now()],
            ["id"=>1316, "county_id"=>45, "sub_county_id"=>264, "name"=>"MASIGE EAST", "created_at"=>now()],
            ["id"=>1317, "county_id"=>45, "sub_county_id"=>264, "name"=>"BASI CENTRAL", "created_at"=>now()],
            ["id"=>1318, "county_id"=>45, "sub_county_id"=>264, "name"=>"NYACHEKI", "created_at"=>now()],
            ["id"=>1319, "county_id"=>45, "sub_county_id"=>264, "name"=>"BASI BOGETAORIO", "created_at"=>now()],
            ["id"=>1320, "county_id"=>45, "sub_county_id"=>264, "name"=>"BOBASI CHACHE", "created_at"=>now()],
            ["id"=>1321, "county_id"=>45, "sub_county_id"=>264, "name"=>"SAMETA/MOKWERERO", "created_at"=>now()],
            ["id"=>1322, "county_id"=>45, "sub_county_id"=>264, "name"=>"BOBASI BOITANGARE", "created_at"=>now()],
            //265_BOMACHOGE_CHACHE
            ["id"=>1323, "county_id"=>45, "sub_county_id"=>265, "name"=>"MAJOGE BASI", "created_at"=>now()],
            ["id"=>1324, "county_id"=>45, "sub_county_id"=>265, "name"=>"BOOCHI/TENDERE", "created_at"=>now()],
            ["id"=>1325, "county_id"=>45, "sub_county_id"=>265, "name"=>"BOSOTI/SENGERA", "created_at"=>now()],
            //266_NYARIBARI_MASABA
            ["id"=>1326, "county_id"=>45, "sub_county_id"=>266, "name"=>"ICHUNI", "created_at"=>now()],
            ["id"=>1327, "county_id"=>45, "sub_county_id"=>266, "name"=>"NYAMASIBI", "created_at"=>now()],
            ["id"=>1328, "county_id"=>45, "sub_county_id"=>266, "name"=>"MASIMBA", "created_at"=>now()],
            ["id"=>1329, "county_id"=>45, "sub_county_id"=>266, "name"=>"GESUSU", "created_at"=>now()],
            ["id"=>1330, "county_id"=>45, "sub_county_id"=>266, "name"=>"KIAMOKAMA", "created_at"=>now()],
            //267_NYARIBARI_CHACHE
            ["id"=>1331, "county_id"=>45, "sub_county_id"=>267, "name"=>"BOBARACHO", "created_at"=>now()],
            ["id"=>1332, "county_id"=>45, "sub_county_id"=>267, "name"=>"KISII CENTRAL", "created_at"=>now()],
            ["id"=>1333, "county_id"=>45, "sub_county_id"=>267, "name"=>"KEUMBU", "created_at"=>now()],
            ["id"=>1334, "county_id"=>45, "sub_county_id"=>267, "name"=>"KIOGORO", "created_at"=>now()],
            ["id"=>1335, "county_id"=>45, "sub_county_id"=>267, "name"=>"BIRONGO", "created_at"=>now()],
            ["id"=>1336, "county_id"=>45, "sub_county_id"=>267, "name"=>"IBENO", "created_at"=>now()],
            //268_KITUTU_CHACHE_NORTH
            ["id"=>1337, "county_id"=>45, "sub_county_id"=>268, "name"=>"MONYERERO", "created_at"=>now()],
            ["id"=>1338, "county_id"=>45, "sub_county_id"=>268, "name"=>"SENSI", "created_at"=>now()],
            ["id"=>1339, "county_id"=>45, "sub_county_id"=>268, "name"=>"MARANI", "created_at"=>now()],
            ["id"=>1340, "county_id"=>45, "sub_county_id"=>268, "name"=>"KEGOGI", "created_at"=>now()],
            //269_KITUTU_CHACHE_SOUTH
            ["id"=>1341, "county_id"=>45, "sub_county_id"=>269, "name"=>"BOGUSERO", "created_at"=>now()],
            ["id"=>1342, "county_id"=>45, "sub_county_id"=>269, "name"=>"BOGEKA", "created_at"=>now()],
            ["id"=>1343, "county_id"=>45, "sub_county_id"=>269, "name"=>"NYAKOE", "created_at"=>now()],
            ["id"=>1344, "county_id"=>45, "sub_county_id"=>269, "name"=>"KITUTU   CENTRAL", "created_at"=>now()],
            ["id"=>1345, "county_id"=>45, "sub_county_id"=>269, "name"=>"NYATIEKO", "created_at"=>now()],


            //46_Nyamira
            //270_KITUTU_MASABA
            ["id"=>1346, "county_id"=>46, "sub_county_id"=>270, "name"=>"RIGOMA", "created_at"=>now()],
            ["id"=>1347, "county_id"=>46, "sub_county_id"=>270, "name"=>"GACHUBA", "created_at"=>now()],
            ["id"=>1348, "county_id"=>46, "sub_county_id"=>270, "name"=>"KEMERA", "created_at"=>now()],
            ["id"=>1349, "county_id"=>46, "sub_county_id"=>270, "name"=>"MAGOMBO", "created_at"=>now()],
            ["id"=>1350, "county_id"=>46, "sub_county_id"=>270, "name"=>"MANGA", "created_at"=>now()],
            ["id"=>1351, "county_id"=>46, "sub_county_id"=>270, "name"=>"GESIMA", "created_at"=>now()],
            //271_WEST_MUGIRANGO
            ["id"=>1352, "county_id"=>46, "sub_county_id"=>271, "name"=>"NYAMAIYA", "created_at"=>now()],
            ["id"=>1353, "county_id"=>46, "sub_county_id"=>271, "name"=>"BOGICHORA", "created_at"=>now()],
            ["id"=>1354, "county_id"=>46, "sub_county_id"=>271, "name"=>"BOSAMARO", "created_at"=>now()],
            ["id"=>1355, "county_id"=>46, "sub_county_id"=>271, "name"=>"BONYAMATUTA", "created_at"=>now()],
            ["id"=>1356, "county_id"=>46, "sub_county_id"=>271, "name"=>"TOWNSHIP", "created_at"=>now()],
            //272_NORTH_MUGIRANGO
            ["id"=>1357, "county_id"=>46, "sub_county_id"=>272, "name"=>"ITIBO", "created_at"=>now()],
            ["id"=>1358, "county_id"=>46, "sub_county_id"=>272, "name"=>"BOMWAGAMO", "created_at"=>now()],
            ["id"=>1359, "county_id"=>46, "sub_county_id"=>272, "name"=>"BOKEIRA", "created_at"=>now()],
            ["id"=>1360, "county_id"=>46, "sub_county_id"=>272, "name"=>"MAGWAGWA", "created_at"=>now()],
            ["id"=>1361, "county_id"=>46, "sub_county_id"=>272, "name"=>"EKERENYO", "created_at"=>now()],
            //273_BORABU
            ["id"=>1362, "county_id"=>46, "sub_county_id"=>273, "name"=>"MEKENENE", "created_at"=>now()],
            ["id"=>1363, "county_id"=>46, "sub_county_id"=>273, "name"=>"KIABONYORU", "created_at"=>now()],
            ["id"=>1364, "county_id"=>46, "sub_county_id"=>273, "name"=>"NYANSIONGO", "created_at"=>now()],
            ["id"=>1365, "county_id"=>46, "sub_county_id"=>273, "name"=>"ESISE", "created_at"=>now()],


            //47_Nairobi
            //274_WESTLANDS
            ["id"=>1366, "county_id"=>47, "sub_county_id"=>274, "name"=>"KITISURU", "created_at"=>now()],
            ["id"=>1367, "county_id"=>47, "sub_county_id"=>274, "name"=>"PARKLANDS/HIGHRIDGE", "created_at"=>now()],
            ["id"=>1368, "county_id"=>47, "sub_county_id"=>274, "name"=>"KARURA", "created_at"=>now()],
            ["id"=>1369, "county_id"=>47, "sub_county_id"=>274, "name"=>"KANGEMI", "created_at"=>now()],
            ["id"=>1370, "county_id"=>47, "sub_county_id"=>274, "name"=>"MOUNTAIN VIEW", "created_at"=>now()],
            //275_DAGORETTI_NORTH
            ["id"=>1371, "county_id"=>47, "sub_county_id"=>275, "name"=>"KILIMANI", "created_at"=>now()],
            ["id"=>1372, "county_id"=>47, "sub_county_id"=>275, "name"=>"KAWANGWARE", "created_at"=>now()],
            ["id"=>1373, "county_id"=>47, "sub_county_id"=>275, "name"=>"GATINA", "created_at"=>now()],
            ["id"=>1374, "county_id"=>47, "sub_county_id"=>275, "name"=>"KILELESHWA", "created_at"=>now()],
            ["id"=>1375, "county_id"=>47, "sub_county_id"=>275, "name"=>"KABIRO", "created_at"=>now()],
            //276_DAGORETTI_SOUTH
            ["id"=>1376, "county_id"=>47, "sub_county_id"=>276, "name"=>"MUTU-INI", "created_at"=>now()],
            ["id"=>1377, "county_id"=>47, "sub_county_id"=>276, "name"=>"NGANDO", "created_at"=>now()],
            ["id"=>1378, "county_id"=>47, "sub_county_id"=>276, "name"=>"RIRUTA", "created_at"=>now()],
            ["id"=>1379, "county_id"=>47, "sub_county_id"=>276, "name"=>"UTHIRU/RUTHIMITU", "created_at"=>now()],
            ["id"=>1380, "county_id"=>47, "sub_county_id"=>276, "name"=>"WAITHAKA", "created_at"=>now()],
            //277_LANGATA
            ["id"=>1381, "county_id"=>47, "sub_county_id"=>277, "name"=>"KAREN", "created_at"=>now()],
            ["id"=>1382, "county_id"=>47, "sub_county_id"=>277, "name"=>"NAIROBI WEST", "created_at"=>now()],
            ["id"=>1383, "county_id"=>47, "sub_county_id"=>277, "name"=>"MUGUMU-INI", "created_at"=>now()],
            ["id"=>1384, "county_id"=>47, "sub_county_id"=>277, "name"=>"SOUTH C", "created_at"=>now()],
            ["id"=>1385, "county_id"=>47, "sub_county_id"=>277, "name"=>"NYAYO HIGHRISE", "created_at"=>now()],
            //278_KIBRA
            ["id"=>1386, "county_id"=>47, "sub_county_id"=>278, "name"=>"LAINI SABA", "created_at"=>now()],
            ["id"=>1387, "county_id"=>47, "sub_county_id"=>278, "name"=>"LINDI", "created_at"=>now()],
            ["id"=>1388, "county_id"=>47, "sub_county_id"=>278, "name"=>"MAKINA", "created_at"=>now()],
            ["id"=>1389, "county_id"=>47, "sub_county_id"=>278, "name"=>"WOODLEY/KENYATTA GOLF COURSE", "created_at"=>now()],
            ["id"=>1390, "county_id"=>47, "sub_county_id"=>278, "name"=>"SARANGOMBE", "created_at"=>now()],
            //279_ROYSAMBU
            ["id"=>1391, "county_id"=>47, "sub_county_id"=>279, "name"=>"GITHURAI", "created_at"=>now()],
            ["id"=>1392, "county_id"=>47, "sub_county_id"=>279, "name"=>"KAHAWA WEST", "created_at"=>now()],
            ["id"=>1393, "county_id"=>47, "sub_county_id"=>279, "name"=>"ZIMMERMAN", "created_at"=>now()],
            ["id"=>1394, "county_id"=>47, "sub_county_id"=>279, "name"=>"ROYSAMBU", "created_at"=>now()],
            ["id"=>1395, "county_id"=>47, "sub_county_id"=>279, "name"=>"KAHAWA", "created_at"=>now()],
            //280_KASARANI
            ["id"=>1396, "county_id"=>47, "sub_county_id"=>280, "name"=>"CLAY CITY", "created_at"=>now()],
            ["id"=>1397, "county_id"=>47, "sub_county_id"=>280, "name"=>"MWIKI", "created_at"=>now()],
            ["id"=>1398, "county_id"=>47, "sub_county_id"=>280, "name"=>"KASARANI", "created_at"=>now()],
            ["id"=>1399, "county_id"=>47, "sub_county_id"=>280, "name"=>"NJIRU", "created_at"=>now()],
            ["id"=>1400, "county_id"=>47, "sub_county_id"=>280, "name"=>"RUAI", "created_at"=>now()],
            //281_RUARAKA
            ["id"=>1401, "county_id"=>47, "sub_county_id"=>281, "name"=>"BABA DOGO", "created_at"=>now()],
            ["id"=>1402, "county_id"=>47, "sub_county_id"=>281, "name"=>"UTALII", "created_at"=>now()],
            ["id"=>1403, "county_id"=>47, "sub_county_id"=>281, "name"=>"MATHARE NORTH", "created_at"=>now()],
            ["id"=>1404, "county_id"=>47, "sub_county_id"=>281, "name"=>"LUCKY SUMMER", "created_at"=>now()],
            ["id"=>1405, "county_id"=>47, "sub_county_id"=>281, "name"=>"KOROGOCHO", "created_at"=>now()],
            //282_EMBAKASI_SOUTH
            ["id"=>1406, "county_id"=>47, "sub_county_id"=>282, "name"=>"IMARA DAIMA", "created_at"=>now()],
            ["id"=>1407, "county_id"=>47, "sub_county_id"=>282, "name"=>"KWA NJENGA", "created_at"=>now()],
            ["id"=>1408, "county_id"=>47, "sub_county_id"=>282, "name"=>"KWA REUBEN", "created_at"=>now()],
            ["id"=>1409, "county_id"=>47, "sub_county_id"=>282, "name"=>"PIPELINE", "created_at"=>now()],
            ["id"=>1410, "county_id"=>47, "sub_county_id"=>282, "name"=>"KWARE", "created_at"=>now()],
            //283_EMBAKASI_NORTH
            ["id"=>1411, "county_id"=>47, "sub_county_id"=>283, "name"=>"KARIOBANGI NORTH", "created_at"=>now()],
            ["id"=>1412, "county_id"=>47, "sub_county_id"=>283, "name"=>"DANDORA AREA I", "created_at"=>now()],
            ["id"=>1413, "county_id"=>47, "sub_county_id"=>283, "name"=>"DANDORA AREA II", "created_at"=>now()],
            ["id"=>1414, "county_id"=>47, "sub_county_id"=>283, "name"=>"DANDORA AREA III", "created_at"=>now()],
            ["id"=>1415, "county_id"=>47, "sub_county_id"=>283, "name"=>"DANDORA AREA IV", "created_at"=>now()],
            //284_EMBAKASI_CENTRAL
            ["id"=>1416, "county_id"=>47, "sub_county_id"=>284, "name"=>"KAYOLE NORTH", "created_at"=>now()],
            ["id"=>1417, "county_id"=>47, "sub_county_id"=>284, "name"=>"KAYOLE CENTRAL", "created_at"=>now()],
            ["id"=>1418, "county_id"=>47, "sub_county_id"=>284, "name"=>"KAYOLE SOUTH", "created_at"=>now()],
            ["id"=>1419, "county_id"=>47, "sub_county_id"=>284, "name"=>"KOMAROCK", "created_at"=>now()],
            ["id"=>1420, "county_id"=>47, "sub_county_id"=>284, "name"=>"MATOPENI/SPRING VALLEY", "created_at"=>now()],
            //285_EMBAKASI_EAST
            ["id"=>1421, "county_id"=>47, "sub_county_id"=>285, "name"=>"UPPER SAVANNAH", "created_at"=>now()],
            ["id"=>1422, "county_id"=>47, "sub_county_id"=>285, "name"=>"LOWER SAVANNAH", "created_at"=>now()],
            ["id"=>1423, "county_id"=>47, "sub_county_id"=>285, "name"=>"EMBAKASI", "created_at"=>now()],
            ["id"=>1424, "county_id"=>47, "sub_county_id"=>285, "name"=>"UTAWALA", "created_at"=>now()],
            ["id"=>1425, "county_id"=>47, "sub_county_id"=>285, "name"=>"MIHANGO", "created_at"=>now()],
            //286_EMBAKASI_WEST
            ["id"=>1426, "county_id"=>47, "sub_county_id"=>286, "name"=>"UMOJA I", "created_at"=>now()],
            ["id"=>1427, "county_id"=>47, "sub_county_id"=>286, "name"=>"UMOJA II", "created_at"=>now()],
            ["id"=>1428, "county_id"=>47, "sub_county_id"=>286, "name"=>"MOWLEM", "created_at"=>now()],
            ["id"=>1429, "county_id"=>47, "sub_county_id"=>286, "name"=>"KARIOBANGI SOUTH", "created_at"=>now()],
            //287_MAKADARA
            ["id"=>1430, "county_id"=>47, "sub_county_id"=>287, "name"=>"MARINGO/HAMZA", "created_at"=>now()],
            ["id"=>1431, "county_id"=>47, "sub_county_id"=>287, "name"=>"VIWANDANI", "created_at"=>now()],
            ["id"=>1432, "county_id"=>47, "sub_county_id"=>287, "name"=>"HARAMBEE", "created_at"=>now()],
            ["id"=>1433, "county_id"=>47, "sub_county_id"=>287, "name"=>"MAKONGENI", "created_at"=>now()],
            //288_KAMUKUNJI
            ["id"=>1434, "county_id"=>47, "sub_county_id"=>288, "name"=>"PUMWANI", "created_at"=>now()],
            ["id"=>1435, "county_id"=>47, "sub_county_id"=>288, "name"=>"EASTLEIGH NORTH", "created_at"=>now()],
            ["id"=>1436, "county_id"=>47, "sub_county_id"=>288, "name"=>"EASTLEIGH SOUTH", "created_at"=>now()],
            ["id"=>1437, "county_id"=>47, "sub_county_id"=>288, "name"=>"AIRBASE", "created_at"=>now()],
            ["id"=>1438, "county_id"=>47, "sub_county_id"=>288, "name"=>"CALIFORNIA", "created_at"=>now()],
            //289_STAREHE
            ["id"=>1439, "county_id"=>47, "sub_county_id"=>289, "name"=>"NAIROBI CENTRAL", "created_at"=>now()],
            ["id"=>1440, "county_id"=>47, "sub_county_id"=>289, "name"=>"NGARA", "created_at"=>now()],
            ["id"=>1441, "county_id"=>47, "sub_county_id"=>289, "name"=>"PANGANI", "created_at"=>now()],
            ["id"=>1442, "county_id"=>47, "sub_county_id"=>289, "name"=>"ZIWANI/KARIOKOR", "created_at"=>now()],
            ["id"=>1443, "county_id"=>47, "sub_county_id"=>289, "name"=>"LANDIMAWE", "created_at"=>now()],
            ["id"=>1444, "county_id"=>47, "sub_county_id"=>289, "name"=>"NAIROBI SOUTH", "created_at"=>now()],
            //290_MATHARE
            ["id"=>1445, "county_id"=>47, "sub_county_id"=>290, "name"=>"HOSPITAL", "created_at"=>now()],
            ["id"=>1446, "county_id"=>47, "sub_county_id"=>290, "name"=>"MABATINI", "created_at"=>now()],
            ["id"=>1447, "county_id"=>47, "sub_county_id"=>290, "name"=>"HURUMA", "created_at"=>now()],
            ["id"=>1448, "county_id"=>47, "sub_county_id"=>290, "name"=>"NGEI", "created_at"=>now()],
            ["id"=>1449, "county_id"=>47, "sub_county_id"=>290, "name"=>"MLANGO KUBWA", "created_at"=>now()],
            ["id"=>1450, "county_id"=>47, "sub_county_id"=>290, "name"=>"KIAMAIKO", "created_at"=>now()],
         ];

         Ward::insert($items);
    }
}
