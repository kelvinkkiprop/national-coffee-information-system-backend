<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Others\SubCounty;

class SubCountySeeder extends Seeder
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
            ["id"=> 1, "county_id"=>1, "name"=>"CHANGAMWE", 'created_at'=>now()],
            ["id"=> 2, "county_id"=>1, "name"=>"JOMVU", 'created_at'=>now()],
            ["id"=> 3, "county_id"=>1, "name"=>"KISAUNI", 'created_at'=>now()],
            ["id"=> 4, "county_id"=>1, "name"=>"NYALI", 'created_at'=>now()],
            ["id"=> 5, "county_id"=>1, "name"=>"LIKONI", 'created_at'=>now()],
            ["id"=> 6, "county_id"=>1, "name"=>"MVITA", 'created_at'=>now()],
            //02_Kwale
            ["id"=> 7, "county_id"=>2, "name"=>"MSAMBWENI", 'created_at'=>now()],
            ["id"=> 8, "county_id"=>2, "name"=>"LUNGALUNGA", 'created_at'=>now()],
            ["id"=> 9, "county_id"=>2, "name"=>"MATUGA", 'created_at'=>now()],
            ["id"=>10, "county_id"=>2, "name"=>"KINANGO", 'created_at'=>now()],
            //03_Kilifi
            ["id"=>11, "county_id"=>3, "name"=>"KILIFI NORTH", 'created_at'=>now()],
            ["id"=>12, "county_id"=>3, "name"=>"KILIFI SOUTH", 'created_at'=>now()],
            ["id"=>13, "county_id"=>3, "name"=>"KALOLENI", 'created_at'=>now()],
            ["id"=>14, "county_id"=>3, "name"=>"RABAI", 'created_at'=>now()],
            ["id"=>15, "county_id"=>3, "name"=>"GANZE", 'created_at'=>now()],
            ["id"=>16, "county_id"=>3, "name"=>"MALINDI", 'created_at'=>now()],
            ["id"=>17, "county_id"=>3, "name"=>"MAGARINI", 'created_at'=>now()],
            //04_TanaRiver
            ["id"=>18, "county_id"=>4,"name"=>"GARSEN", 'created_at'=>now()],
            ["id"=>19, "county_id"=>4,"name"=>"GALOLE", 'created_at'=>now()],
            ["id"=>20, "county_id"=>4,"name"=>"BURA", 'created_at'=>now()],
            //05_Lamu
            ["id"=>21, "county_id"=>5, "name"=>"LAMU EAST", 'created_at'=>now()],
            ["id"=>22, "county_id"=>5, "name"=>"LAMU WEST", 'created_at'=>now()],
            //06_TaitaTaveta
            ["id"=>23, "county_id"=>6, "name"=>"TAVETA", 'created_at'=>now()],
            ["id"=>24, "county_id"=>6, "name"=>"WUNDANYI", 'created_at'=>now()],
            ["id"=>25, "county_id"=>6, "name"=>"MWATATE", 'created_at'=>now()],
            ["id"=>26, "county_id"=>6, "name"=>"VOI", 'created_at'=>now()],
            //07_Garissa
            ["id"=>27, "county_id"=>7, "name"=>"GARISSA TOWNSHIP", 'created_at'=>now()],
            ["id"=>28, "county_id"=>7, "name"=>"BALAMBALA", 'created_at'=>now()],
            ["id"=>29, "county_id"=>7, "name"=>"LAGDERA", 'created_at'=>now()],
            ["id"=>30, "county_id"=>7, "name"=>"DADAAB", 'created_at'=>now()],
            ["id"=>31, "county_id"=>7, "name"=>"FAFI", 'created_at'=>now()],
            ["id"=>32, "county_id"=>7, "name"=>"IJARA", 'created_at'=>now()],
            //08_Wajir
            ["id"=>33, "county_id"=>8, "name"=>"WAJIR NORTH", 'created_at'=>now()],
            ["id"=>34, "county_id"=>8, "name"=>"WAJIR EAST", 'created_at'=>now()],
            ["id"=>35, "county_id"=>8, "name"=>"TARBAJ", 'created_at'=>now()],
            ["id"=>36, "county_id"=>8, "name"=>"WAJIR WEST", 'created_at'=>now()],
            ["id"=>37, "county_id"=>8, "name"=>"ELDAS", 'created_at'=>now()],
            ["id"=>38, "county_id"=>8, "name"=>"WAJIR SOUTH", 'created_at'=>now()],
            //09_Mandera
            ["id"=>39, "county_id"=>9, "name"=>"MANDERA WEST", 'created_at'=>now()],
            ["id"=>40, "county_id"=>9, "name"=>"BANISSA", 'created_at'=>now()],
            ["id"=>41, "county_id"=>9, "name"=>"MANDERA NORTH", 'created_at'=>now()],
            ["id"=>42, "county_id"=>9, "name"=>"MANDERA SOUTH", 'created_at'=>now()],
            ["id"=>43, "county_id"=>9, "name"=>"MANDERA EAST", 'created_at'=>now()],
            ["id"=>44, "county_id"=>9, "name"=>"LAFEY", 'created_at'=>now()],
             //10_Marsabit
            ["id"=>45, "county_id"=>10, "name"=>"MOYALE", 'created_at'=>now()],
            ["id"=>46, "county_id"=>10, "name"=>"NORTH HORR", 'created_at'=>now()],
            ["id"=>47, "county_id"=>10, "name"=>"SAKU", 'created_at'=>now()],
            ["id"=>48, "county_id"=>10, "name"=>"LAISAMIS", 'created_at'=>now()],
            //11_Isiolo
            ["id"=>49, "county_id"=>11, "name"=>"ISIOLO NORTH", 'created_at'=>now()],
            ["id"=>50, "county_id"=>11, "name"=>"ISIOLO SOUTH", 'created_at'=>now()],
            //12_Meru
            ["id"=>51, "county_id"=>12, "name"=>"IGEMBE SOUTH", 'created_at'=>now()],
            ["id"=>52, "county_id"=>12, "name"=>"IGEMBE CENTRAL", 'created_at'=>now()],
            ["id"=>53, "county_id"=>12, "name"=>"IGEMBE NORTH", 'created_at'=>now()],
            ["id"=>54, "county_id"=>12, "name"=>"TIGANIA WEST", 'created_at'=>now()],
            ["id"=>55, "county_id"=>12, "name"=>"TIGANIA EAST", 'created_at'=>now()],
            ["id"=>56, "county_id"=>12, "name"=>"NORTH IMENTI", 'created_at'=>now()],
            ["id"=>57, "county_id"=>12, "name"=>"BUURI", 'created_at'=>now()],
            ["id"=>58, "county_id"=>12, "name"=>"CENTRAL IMENTI", 'created_at'=>now()],
            ["id"=>59, "county_id"=>12, "name"=>"SOUTH IMENTI", 'created_at'=>now()],
            //13_TharakaNithi
            ["id"=>60, "county_id"=>13, "name"=>"MAARA", 'created_at'=>now()],
            ["id"=>61, "county_id"=>13, "name"=>"CHUKA/IGAMBANG'OMBE", 'created_at'=>now()],
            ["id"=>62, "county_id"=>13, "name"=>"THARAKA", 'created_at'=>now()],
            //14_Embu
            ["id"=>63, "county_id"=>14, "name"=>"MANYATTA", 'created_at'=>now()],
            ["id"=>64, "county_id"=>14, "name"=>"RUNYENJES", 'created_at'=>now()],
            ["id"=>65, "county_id"=>14, "name"=>"MBEERE SOUTH", 'created_at'=>now()],
            ["id"=>66, "county_id"=>14, "name"=>"MBEERE NORTH", 'created_at'=>now()],
            //15_Kitui
            ["id"=>67, "county_id"=>15, "name"=>"MWINGI NORTH", 'created_at'=>now()],
            ["id"=>68, "county_id"=>15, "name"=>"MWINGI WEST", 'created_at'=>now()],
            ["id"=>69, "county_id"=>15, "name"=>"MWINGI CENTRAL", 'created_at'=>now()],
            ["id"=>70, "county_id"=>15, "name"=>"KITUI WEST", 'created_at'=>now()],
            ["id"=>71, "county_id"=>15, "name"=>"KITUI RURAL", 'created_at'=>now()],
            ["id"=>72, "county_id"=>15, "name"=>"KITUI CENTRAL", 'created_at'=>now()],
            ["id"=>73, "county_id"=>15, "name"=>"KITUI EAST", 'created_at'=>now()],
            ["id"=>74, "county_id"=>15, "name"=>"KITUI SOUTH", 'created_at'=>now()],
            //16_Machakos
            ["id"=>75, "county_id"=>16, "name"=>"MASINGA", 'created_at'=>now()],
            ["id"=>76, "county_id"=>16, "name"=>"YATTA", 'created_at'=>now()],
            ["id"=>77, "county_id"=>16, "name"=>"KANGUNDO", 'created_at'=>now()],
            ["id"=>78, "county_id"=>16, "name"=>"MATUNGULU", 'created_at'=>now()],
            ["id"=>79, "county_id"=>16, "name"=>"KATHIANI", 'created_at'=>now()],
            ["id"=>80, "county_id"=>16, "name"=>"MAVOKO", 'created_at'=>now()],
            ["id"=>81, "county_id"=>16, "name"=>"MACHAKOS TOWN", 'created_at'=>now()],
            ["id"=>82, "county_id"=>16, "name"=>"MWALA", 'created_at'=>now()],
            //17_Makueni
            ["id"=>83, "county_id"=>17, "name"=>"MBOONI", 'created_at'=>now()],
            ["id"=>84, "county_id"=>17, "name"=>"KILOME", 'created_at'=>now()],
            ["id"=>85, "county_id"=>17, "name"=>"KAITI", 'created_at'=>now()],
            ["id"=>86, "county_id"=>17, "name"=>"MAKUENI", 'created_at'=>now()],
            ["id"=>87, "county_id"=>17, "name"=>"KIBWEZI WEST", 'created_at'=>now()],
            ["id"=>88, "county_id"=>17, "name"=>"KIBWEZI EAST", 'created_at'=>now()],
            //18_Nyandarua
            ["id"=>89, "county_id"=>18, "name"=>"KINANGOP", 'created_at'=>now()],
            ["id"=>90, "county_id"=>18, "name"=>"KIPIPIRI", 'created_at'=>now()],
            ["id"=>91, "county_id"=>18, "name"=>"OL KALOU", 'created_at'=>now()],
            ["id"=>92, "county_id"=>18, "name"=>"OL JOROK", 'created_at'=>now()],
            ["id"=>93, "county_id"=>18, "name"=>"NDARAGWA", 'created_at'=>now()],
            //19_Nyeri
            ["id"=>94, "county_id"=>19, "name"=>"TETU", 'created_at'=>now()],
            ["id"=>95, "county_id"=>19, "name"=>"KIENI", 'created_at'=>now()],
            ["id"=>96, "county_id"=>19, "name"=>"MATHIRA", 'created_at'=>now()],
            ["id"=>97, "county_id"=>19, "name"=>"OTHAYA", 'created_at'=>now()],
            ["id"=>98, "county_id"=>19, "name"=>"MUKURWEINI", 'created_at'=>now()],
            ["id"=>99, "county_id"=>19, "name"=>"NYERI TOWN", 'created_at'=>now()],
            //20_Kirinyaga
            ["id"=>100, "county_id"=>20, "name"=>"MWEA", 'created_at'=>now()],
            ["id"=>101, "county_id"=>20, "name"=>"GICHUGU", 'created_at'=>now()],
            ["id"=>102, "county_id"=>20, "name"=>"NDIA", 'created_at'=>now()],
            ["id"=>103, "county_id"=>20, "name"=>"KIRINYAGA CENTRAL", 'created_at'=>now()],
            //21_Muranga
            ["id"=>104, "county_id"=>21, "name"=>"KANGEMA", 'created_at'=>now()],
            ["id"=>105, "county_id"=>21, "name"=>"MATHIOYA", 'created_at'=>now()],
            ["id"=>106, "county_id"=>21, "name"=>"KIHARU", 'created_at'=>now()],
            ["id"=>107, "county_id"=>21, "name"=>"KIGUMO", 'created_at'=>now()],
            ["id"=>108, "county_id"=>21, "name"=>"MARAGWA", 'created_at'=>now()],
            ["id"=>109, "county_id"=>21, "name"=>"KANDARA", 'created_at'=>now()],
            ["id"=>110, "county_id"=>21, "name"=>"GATANGA", 'created_at'=>now()],
            //22_Kiambu
            ["id"=>111, "county_id"=>22, "name"=>"GATUNDU SOUTH", 'created_at'=>now()],
            ["id"=>112, "county_id"=>22, "name"=>"GATUNDU NORTH", 'created_at'=>now()],
            ["id"=>113, "county_id"=>22, "name"=>"JUJA", 'created_at'=>now()],
            ["id"=>114, "county_id"=>22, "name"=>"THIKA TOWN", 'created_at'=>now()],
            ["id"=>115, "county_id"=>22, "name"=>"RUIRU", 'created_at'=>now()],
            ["id"=>116, "county_id"=>22, "name"=>"GITHUNGURI", 'created_at'=>now()],
            ["id"=>117, "county_id"=>22, "name"=>"KIAMBU", 'created_at'=>now()],
            ["id"=>118, "county_id"=>22, "name"=>"KIAMBAA", 'created_at'=>now()],
            ["id"=>119, "county_id"=>22, "name"=>"KABETE", 'created_at'=>now()],
            ["id"=>120, "county_id"=>22, "name"=>"KIKUYU", 'created_at'=>now()],
            ["id"=>121, "county_id"=>22, "name"=>"LIMURU", 'created_at'=>now()],
            ["id"=>122, "county_id"=>22, "name"=>"LARI", 'created_at'=>now()],
            //23_Turkana
            ["id"=>123, "county_id"=>23, "name"=>"TURKANA NORTH", 'created_at'=>now()],
            ["id"=>124, "county_id"=>23, "name"=>"TURKANA WEST", 'created_at'=>now()],
            ["id"=>125, "county_id"=>23, "name"=>"TURKANA CENTRAL", 'created_at'=>now()],
            ["id"=>126, "county_id"=>23, "name"=>"LOIMA", 'created_at'=>now()],
            ["id"=>127, "county_id"=>23, "name"=>"TURKANA SOUTH", 'created_at'=>now()],
            ["id"=>128, "county_id"=>23, "name"=>"TURKANA EAST", 'created_at'=>now()],
            //24_WestPokot
            ["id"=>129, "county_id"=>24, "name"=>"KAPENGURIA", 'created_at'=>now()],
            ["id"=>130, "county_id"=>24, "name"=>"SIGOR", 'created_at'=>now()],
            ["id"=>131, "county_id"=>24, "name"=>"KACHELIBA", 'created_at'=>now()],
            ["id"=>132, "county_id"=>24, "name"=>"POKOT SOUTH", 'created_at'=>now()],
            //25_Samburu
            ["id"=>133, "county_id"=>25, "name"=>"SAMBURU WEST", 'created_at'=>now()],
            ["id"=>134, "county_id"=>25, "name"=>"SAMBURU NORTH", 'created_at'=>now()],
            ["id"=>135, "county_id"=>25, "name"=>"SAMBURU EAST", 'created_at'=>now()],
            //26_TransNzoia
            ["id"=>136, "county_id"=>26, "name"=>"KWANZA", 'created_at'=>now()],
            ["id"=>137, "county_id"=>26, "name"=>"ENDEBESS", 'created_at'=>now()],
            ["id"=>138, "county_id"=>26, "name"=>"SABOTI", 'created_at'=>now()],
            ["id"=>139, "county_id"=>26, "name"=>"KIMININI", 'created_at'=>now()],
            ["id"=>140, "county_id"=>26, "name"=>"CHERANGANY", 'created_at'=>now()],
            //27_UasinGishu
            ["id"=>141, "county_id"=>27, "name"=>"SOY", 'created_at'=>now()],
            ["id"=>142, "county_id"=>27, "name"=>"TURBO", 'created_at'=>now()],
            ["id"=>143, "county_id"=>27, "name"=>"MOIBEN", 'created_at'=>now()],
            ["id"=>144, "county_id"=>27, "name"=>"AINABKOI", 'created_at'=>now()],
            ["id"=>145, "county_id"=>27, "name"=>"KAPSERET", 'created_at'=>now()],
            ["id"=>146, "county_id"=>27, "name"=>"KESSES", 'created_at'=>now()],
            //28_ElgeyoMarakwet
            ["id"=>147, "county_id"=>28, "name"=>"MARAKWET EAST", 'created_at'=>now()],
            ["id"=>148, "county_id"=>28, "name"=>"MARAKWET WEST", 'created_at'=>now()],
            ["id"=>149, "county_id"=>28, "name"=>"KEIYO NORTH", 'created_at'=>now()],
            ["id"=>150, "county_id"=>28, "name"=>"KEIYO SOUTH", 'created_at'=>now()],
            //29_Nandi
            ["id"=>151, "county_id"=>29, "name"=>"TINDERET", 'created_at'=>now()],
            ["id"=>152, "county_id"=>29, "name"=>"ALDAI", 'created_at'=>now()],
            ["id"=>153, "county_id"=>29, "name"=>"NANDI HILLS", 'created_at'=>now()],
            ["id"=>154, "county_id"=>29, "name"=>"CHESUMEI", 'created_at'=>now()],
            ["id"=>155, "county_id"=>29, "name"=>"EMGWEN", 'created_at'=>now()],
            ["id"=>156, "county_id"=>29, "name"=>"MOSOP", 'created_at'=>now()],
            //30_Baringo
            ["id"=>157, "county_id"=>30, "name"=>"TIATY", 'created_at'=>now()],
            ["id"=>158, "county_id"=>30, "name"=>"BARINGO  NORTH", 'created_at'=>now()],
            ["id"=>159, "county_id"=>30, "name"=>"BARINGO CENTRAL", 'created_at'=>now()],
            ["id"=>160, "county_id"=>30, "name"=>"BARINGO SOUTH", 'created_at'=>now()],
            ["id"=>161, "county_id"=>30, "name"=>"MOGOTIO", 'created_at'=>now()],
            ["id"=>162, "county_id"=>30, "name"=>"ELDAMA RAVINE", 'created_at'=>now()],
            //31_Laikipia
            ["id"=>163, "county_id"=>31, "name"=>"LAIKIPIA WEST", 'created_at'=>now()],
            ["id"=>164, "county_id"=>31, "name"=>"LAIKIPIA EAST", 'created_at'=>now()],
            ["id"=>165, "county_id"=>31, "name"=>"LAIKIPIA NORTH", 'created_at'=>now()],
            //32_Nakuru
            ["id"=>166, "county_id"=>32, "name"=>"MOLO", 'created_at'=>now()],
            ["id"=>167, "county_id"=>32, "name"=>"NJORO", 'created_at'=>now()],
            ["id"=>168, "county_id"=>32, "name"=>"NAIVASHA", 'created_at'=>now()],
            ["id"=>169, "county_id"=>32, "name"=>"GILGIL", 'created_at'=>now()],
            ["id"=>170, "county_id"=>32, "name"=>"KURESOI SOUTH", 'created_at'=>now()],
            ["id"=>171, "county_id"=>32, "name"=>"KURESOI NORTH", 'created_at'=>now()],
            ["id"=>172, "county_id"=>32, "name"=>"SUBUKIA", 'created_at'=>now()],
            ["id"=>173, "county_id"=>32, "name"=>"RONGAI", 'created_at'=>now()],
            ["id"=>174, "county_id"=>32, "name"=>"BAHATI", 'created_at'=>now()],
            ["id"=>175, "county_id"=>32, "name"=>"NAKURU TOWN WEST", 'created_at'=>now()],
            ["id"=>176, "county_id"=>32, "name"=>"NAKURU TOWN EAST", 'created_at'=>now()],
            //33_Narok
            ["id"=>177, "county_id"=>33, "name"=>"KILGORIS", 'created_at'=>now()],
            ["id"=>178, "county_id"=>33, "name"=>"EMURUA DIKIRR", 'created_at'=>now()],
            ["id"=>179, "county_id"=>33, "name"=>"NAROK NORTH", 'created_at'=>now()],
            ["id"=>180, "county_id"=>33, "name"=>"NAROK EAST", 'created_at'=>now()],
            ["id"=>181, "county_id"=>33, "name"=>"NAROK SOUTH", 'created_at'=>now()],
            ["id"=>182, "county_id"=>33, "name"=>"NAROK WEST", 'created_at'=>now()],
            //34_Kajiado
            ["id"=>183, "county_id"=>34, "name"=>"KAJIADO NORTH", 'created_at'=>now()],
            ["id"=>184, "county_id"=>34, "name"=>"KAJIADO CENTRAL", 'created_at'=>now()],
            ["id"=>185, "county_id"=>34, "name"=>"KAJIADO EAST", 'created_at'=>now()],
            ["id"=>186, "county_id"=>34, "name"=>"KAJIADO WEST", 'created_at'=>now()],
            ["id"=>187, "county_id"=>34, "name"=>"KAJIADO SOUTH", 'created_at'=>now()],
            //35_Kericho
            ["id"=>188, "county_id"=>35, "name"=>"KIPKELION EAST", 'created_at'=>now()],
            ["id"=>189, "county_id"=>35, "name"=>"KIPKELION WEST", 'created_at'=>now()],
            ["id"=>190, "county_id"=>35, "name"=>"AINAMOI", 'created_at'=>now()],
            ["id"=>191, "county_id"=>35, "name"=>"BURETI", 'created_at'=>now()],
            ["id"=>192, "county_id"=>35, "name"=>"BELGUT", 'created_at'=>now()],
            ["id"=>193, "county_id"=>35, "name"=>"SIGOWET/SOIN", 'created_at'=>now()],
            //36_Bomet
            ["id"=>194, "county_id"=>36, "name"=>"SOTIK", 'created_at'=>now()],
            ["id"=>195, "county_id"=>36, "name"=>"CHEPALUNGU", 'created_at'=>now()],
            ["id"=>196, "county_id"=>36, "name"=>"BOMET EAST", 'created_at'=>now()],
            ["id"=>197, "county_id"=>36, "name"=>"BOMET CENTRAL", 'created_at'=>now()],
            ["id"=>198, "county_id"=>36, "name"=>"KONOIN", 'created_at'=>now()],
            //37_Kakamega
            ["id"=>199, "county_id"=>37, "name"=>"LUGARI", 'created_at'=>now()],
            ["id"=>200, "county_id"=>37, "name"=>"LIKUYANI", 'created_at'=>now()],
            ["id"=>201, "county_id"=>37, "name"=>"MALAVA", 'created_at'=>now()],
            ["id"=>202, "county_id"=>37, "name"=>"LURAMBI", 'created_at'=>now()],
            ["id"=>203, "county_id"=>37, "name"=>"NAVAKHOLO", 'created_at'=>now()],
            ["id"=>204, "county_id"=>37, "name"=>"MUMIAS WEST", 'created_at'=>now()],
            ["id"=>205, "county_id"=>37, "name"=>"MUMIAS EAST", 'created_at'=>now()],
            ["id"=>206, "county_id"=>37, "name"=>"MATUNGU", 'created_at'=>now()],
            ["id"=>207, "county_id"=>37, "name"=>"BUTERE", 'created_at'=>now()],
            ["id"=>208, "county_id"=>37, "name"=>"KHWISERO", 'created_at'=>now()],
            ["id"=>209, "county_id"=>37, "name"=>"SHINYALU", 'created_at'=>now()],
            ["id"=>210, "county_id"=>37, "name"=>"IKOLOMANI", 'created_at'=>now()],
            //38_Vihiga
            ["id"=>211, "county_id"=>38, "name"=>"VIHIGA", 'created_at'=>now()],
            ["id"=>212, "county_id"=>38, "name"=>"SABATIA", 'created_at'=>now()],
            ["id"=>213, "county_id"=>38, "name"=>"HAMISI", 'created_at'=>now()],
            ["id"=>214, "county_id"=>38, "name"=>"LUANDA", 'created_at'=>now()],
            ["id"=>215, "county_id"=>38, "name"=>"EMUHAYA", 'created_at'=>now()],
            //39_Bungoma
            ["id"=>216, "county_id"=>39, "name"=>"MT.ELGON", 'created_at'=>now()],
            ["id"=>217, "county_id"=>39, "name"=>"SIRISIA", 'created_at'=>now()],
            ["id"=>218, "county_id"=>39, "name"=>"KABUCHAI", 'created_at'=>now()],
            ["id"=>219, "county_id"=>39, "name"=>"BUMULA", 'created_at'=>now()],
            ["id"=>220, "county_id"=>39, "name"=>"KANDUYI", 'created_at'=>now()],
            ["id"=>221, "county_id"=>39, "name"=>"WEBUYE EAST", 'created_at'=>now()],
            ["id"=>222, "county_id"=>39, "name"=>"WEBUYE WEST", 'created_at'=>now()],
            ["id"=>223, "county_id"=>39, "name"=>"KIMILILI", 'created_at'=>now()],
            ["id"=>224, "county_id"=>39, "name"=>"TONGAREN", 'created_at'=>now()],
            //40_Busia
            ["id"=>225, "county_id"=>40, "name"=>"TESO NORTH", 'created_at'=>now()],
            ["id"=>226, "county_id"=>40, "name"=>"TESO SOUTH", 'created_at'=>now()],
            ["id"=>227, "county_id"=>40, "name"=>"NAMBALE", 'created_at'=>now()],
            ["id"=>228, "county_id"=>40, "name"=>"MATAYOS", 'created_at'=>now()],
            ["id"=>229, "county_id"=>40, "name"=>"BUTULA", 'created_at'=>now()],
            ["id"=>230, "county_id"=>40, "name"=>"FUNYULA", 'created_at'=>now()],
            ["id"=>231, "county_id"=>40, "name"=>"BUDALANGI", 'created_at'=>now()],
            //41_Siaya
            ["id"=>232, "county_id"=>41, "name"=>"UGENYA", 'created_at'=>now()],
            ["id"=>233, "county_id"=>41, "name"=>"UGUNJA", 'created_at'=>now()],
            ["id"=>234, "county_id"=>41, "name"=>"ALEGO USONGA", 'created_at'=>now()],
            ["id"=>235, "county_id"=>41, "name"=>"GEM", 'created_at'=>now()],
            ["id"=>236, "county_id"=>41, "name"=>"BONDO", 'created_at'=>now()],
            ["id"=>237, "county_id"=>41, "name"=>"RARIEDA", 'created_at'=>now()],
            //42_Kisumu
            ["id"=>238, "county_id"=>42, "name"=>"KISUMU EAST", 'created_at'=>now()],
            ["id"=>239, "county_id"=>42, "name"=>"KISUMU WEST", 'created_at'=>now()],
            ["id"=>240, "county_id"=>42, "name"=>"KISUMU CENTRAL", 'created_at'=>now()],
            ["id"=>241, "county_id"=>42, "name"=>"SEME", 'created_at'=>now()],
            ["id"=>242, "county_id"=>42, "name"=>"NYANDO", 'created_at'=>now()],
            ["id"=>243, "county_id"=>42, "name"=>"MUHORONI", 'created_at'=>now()],
            ["id"=>244, "county_id"=>42, "name"=>"NYAKACH", 'created_at'=>now()],
            //43_HomaBay
            ["id"=>245, "county_id"=>43, "name"=>"KASIPUL", 'created_at'=>now()],
            ["id"=>246, "county_id"=>43, "name"=>"KABONDO KASIPUL", 'created_at'=>now()],
            ["id"=>247, "county_id"=>43, "name"=>"KARACHUONYO", 'created_at'=>now()],
            ["id"=>248, "county_id"=>43, "name"=>"RANGWE", 'created_at'=>now()],
            ["id"=>249, "county_id"=>43, "name"=>"HOMA BAY TOWN", 'created_at'=>now()],
            ["id"=>250, "county_id"=>43, "name"=>"NDHIWA", 'created_at'=>now()],
            ["id"=>251, "county_id"=>43, "name"=>"SUBA NORTH", 'created_at'=>now()],
            ["id"=>252, "county_id"=>43, "name"=>"SUBA SOUTH", 'created_at'=>now()],
            //44_Migori
            ["id"=>253, "county_id"=>44, "name"=>"RONGO", 'created_at'=>now()],
            ["id"=>254, "county_id"=>44, "name"=>"AWENDO", 'created_at'=>now()],
            ["id"=>255, "county_id"=>44, "name"=>"SUNA EAST", 'created_at'=>now()],
            ["id"=>256, "county_id"=>44, "name"=>"SUNA WEST", 'created_at'=>now()],
            ["id"=>257, "county_id"=>44, "name"=>"URIRI", 'created_at'=>now()],
            ["id"=>258, "county_id"=>44, "name"=>"NYATIKE", 'created_at'=>now()],
            ["id"=>259, "county_id"=>44, "name"=>"KURIA WEST", 'created_at'=>now()],
            ["id"=>260, "county_id"=>44, "name"=>"KURIA EAST", 'created_at'=>now()],
            //45_Kisii
            ["id"=>261, "county_id"=>45, "name"=>"BONCHARI", 'created_at'=>now()],
            ["id"=>262, "county_id"=>45, "name"=>"SOUTH MUGIRANGO", 'created_at'=>now()],
            ["id"=>263, "county_id"=>45, "name"=>"BOMACHOGE BORABU", 'created_at'=>now()],
            ["id"=>264, "county_id"=>45, "name"=>"BOBASI", 'created_at'=>now()],
            ["id"=>265, "county_id"=>45, "name"=>"BOMACHOGE CHACHE", 'created_at'=>now()],
            ["id"=>266, "county_id"=>45, "name"=>"NYARIBARI MASABA", 'created_at'=>now()],
            ["id"=>267, "county_id"=>45, "name"=>"NYARIBARI CHACHE", 'created_at'=>now()],
            ["id"=>268, "county_id"=>45, "name"=>"KITUTU CHACHE NORTH", 'created_at'=>now()],
            ["id"=>269, "county_id"=>45, "name"=>"KITUTU CHACHE SOUTH", 'created_at'=>now()],
            //46_Nyamira
            ["id"=>270, "county_id"=>46, "name"=>"KITUTU MASABA", 'created_at'=>now()],
            ["id"=>271, "county_id"=>46, "name"=>"WEST MUGIRANGO", 'created_at'=>now()],
            ["id"=>272, "county_id"=>46, "name"=>"NORTH MUGIRANGO", 'created_at'=>now()],
            ["id"=>273, "county_id"=>46, "name"=>"BORABU", 'created_at'=>now()],
            //47_Nairobi
            ["id"=>274, "county_id"=>47, "name"=>"WESTLANDS", 'created_at'=>now()],
            ["id"=>275, "county_id"=>47, "name"=>"DAGORETTI NORTH", 'created_at'=>now()],
            ["id"=>276, "county_id"=>47, "name"=>"DAGORETTI SOUTH", 'created_at'=>now()],
            ["id"=>277, "county_id"=>47, "name"=>"LANGATA", 'created_at'=>now()],
            ["id"=>278, "county_id"=>47, "name"=>"KIBRA", 'created_at'=>now()],
            ["id"=>279, "county_id"=>47, "name"=>"ROYSAMBU", 'created_at'=>now()],
            ["id"=>280, "county_id"=>47, "name"=>"KASARANI", 'created_at'=>now()],
            ["id"=>281, "county_id"=>47, "name"=>"RUARAKA", 'created_at'=>now()],
            ["id"=>282, "county_id"=>47, "name"=>"EMBAKASI SOUTH", 'created_at'=>now()],
            ["id"=>283, "county_id"=>47, "name"=>"EMBAKASI NORTH", 'created_at'=>now()],
            ["id"=>284, "county_id"=>47, "name"=>"EMBAKASI CENTRAL", 'created_at'=>now()],
            ["id"=>285, "county_id"=>47, "name"=>"EMBAKASI EAST", 'created_at'=>now()],
            ["id"=>286, "county_id"=>47, "name"=>"EMBAKASI WEST", 'created_at'=>now()],
            ["id"=>287, "county_id"=>47, "name"=>"MAKADARA", 'created_at'=>now()],
            ["id"=>288, "county_id"=>47, "name"=>"KAMUKUNJI", 'created_at'=>now()],
            ["id"=>289, "county_id"=>47, "name"=>"STAREHE", 'created_at'=>now()],
            ["id"=>290, "county_id"=>47, "name"=>"MATHARE", 'created_at'=>now()],
         ];

         SubCounty::insert($items);
    }
}
