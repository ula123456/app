<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class TransliterationController extends Controller
{
    
    

        public function to_cyrillic(Request $request) {

                 $text = $request->input('title');

            
       

  
      

$E_WORDS = array('bel(e)taj' => 'бельэтаж','bugun-(e)rta' => 'бугун-эрта','diqqat-(e)ʼtibor' => 'диққат-эътибор', 'ich-(e)t' => 'ич-эт','karat(e)' => 'каратэ', 'm(e)r' => 'мэр','obroʻ-(e)ʼtiborli' => 'обрў-эътиборли','omon-(e)son' => 'омон-эсон','r(e)ket' => 'рэкет','sut(e)mizuvchilar' => 'сутэмизувчилар','upa-(e)lik' => 'упа-элик','xayr-(e)hson' => 'хайр-эҳсон','qayn(e)gachi' => 'қайнэгачи',);
$LATIN_TO_CYRILLIC  = array('a' => 'а', 'A' => 'А','b' => 'б', 'B' => 'Б', 'd' => 'д', 'D' => 'Д',
        'e' => 'е', 'E' => 'Е','f' => 'ф', 'F' => 'Ф','g' => 'г', 'G' => 'Г','h' => 'ҳ', 'H' => 'Ҳ',
        'i' => 'и', 'I' => 'И','j' => 'ж', 'J' => 'Ж','k' => 'к', 'K' => 'К','l' => 'л', 'L' => 'Л',
        'm' => 'м', 'M' => 'М', 'n' => 'н', 'N' => 'Н','o' => 'о', 'O' => 'О','p' => 'п', 'P' => 'П',
        'q' => 'қ', 'Q' => 'Қ','r' => 'р', 'R' => 'Р','s' => 'с', 'S' => 'С','t' => 'т', 'T' => 'Т',
        'u' => 'у', 'U' => 'У','v' => 'в', 'V' => 'В','x' => 'х', 'X' => 'Х', 'y' => 'й', 'Y' => 'Й',
        'z' => 'з', 'Z' => 'З', 'ʼ' => 'ъ' );

$LATIN_VOWELS = array('a', 'A', 'e', 'E', 'i', 'I', 'o', 'O', 'u', 'U', 'o‘', 'O‘');

$TS_WORDS = array('aberra(ts)ion' => 'аберрацион','aberra(ts)iya' => 'аберрация','abza(ts)' => 'абзац', 'aboli(ts)iya' => 'аболиция','absorb(s)iya' => 'абсорбция','abstrak(s)ionizm' => 'абстракционизм','abstrak(s)ionist' => 'абстракционист','abstrak(s)iya' => 'абстракция','abs(s)ess' => 'абсцесс','avianose(ts)' => 'авианосец','avia(ts)iya' => 'авиация','avtoinspek(s)iya' => 'автоинспекция','avtopr(s)ep' => 'автопрцеп','avtostan(s)iya' => 'автостанция','agglyutina(ts)iya' => 'агглютинация','agita(ts)ion' => 'агитацион','agita(ts)iya' => 'агитация','aglomera(ts)iya' => 'агломерация', 'agnosti(ts)izm' => 'агностицизм','agromeliora(ts)iya' => 'агромелиорация','adapta(ts)iya' => 'адаптация','administra(ts)iya' => 'администрация','adsorb(s)iya' => 'адсорбция', 'aka(ts)iya' => 'акация','akklimatiza(ts)iya' => 'акклиматизация','akkomoda(ts)iya' => 'аккомодация',        'akkredita(ts)iya' => 'аккредитация','ak(s)ent' => 'акцент','ak(s)iz' => 'акциз',
        'ak(s)ioner' => 'акционер',        'ak(s)ionerlik' => 'акционерлик',        'ak(s)iya' => 'акция',
        'ak(s)iyadorlik' => 'акциядорлик',        'allitera(ts)iya' => 'аллитерация',        'amortiza(ts)iya' => 'амортизация',        'amputa(ts)iya' => 'ампутация',        'annota(ts)iya' => 'аннотация',        'annulya(ts)iya' => 'аннуляция',        'anti(ts)iklon' => 'антициклон',
        'antra(ts)it' => 'антрацит',        'apellya(ts)iya' => 'апелляция',        'appendi(ts)it' => 'аппендицит',        'applika(ts)iya' => 'аппликация',        'aproba(ts)iya' => 'апробация',
        'argumenta(ts)iya' => 'аргументация',        'assimilya(ts)iya' => 'ассимиляция',        'asso(ts)ia(ts)iya' => 'ассоциация',        'attesta(ts)ion' => 'аттестацион',        'attesta(ts)iya' => 'аттестация',        'attrak(s)ion' => 'аттракцион',        'auk(s)ion' => 'аукцион',
        'a(ts)etilen' => 'ацетилен',        'a(ts)eton' => 'ацетон',        'aeronaviga(ts)iya' => 'аэронавигация',        'bakteri(ts)id' => 'бактерицид',
        'ba(ts)illar' => 'бациллар',        'bioloka(ts)iya' => 'биолокация',        'biolyumines(s)en(s)iya' => 'биолюминесценция',        'bo(ts)man' => 'боцман',        'bronenose(ts)' => 'броненосец',        'bru(ts)ellyoz' => 'бруцеллёз',        'vak(s)ina' => 'вакцина',
        'valva(ts)iya' => 'вальвация',        'vegeta(ts)ion' => 'вегетацион',        'vegeta(ts)iya' => 'вегетация',        'venepunk(s)iya' => 'венепункция',        'ventilya(ts)ion' => 'вентиляцион',        'ventilya(ts)iya' => 'вентиляция',        'vibra(ts)iya' => 'вибрация',
        'vibroizolya(ts)iya' => 'виброизоляция',        'vi(ts)e-' => 'вице-',        'vi(ts)e-admiral' => 'вице-адмирал',        'vi(ts)e-prezident' => 'вице-президент',        'vulkaniza(ts)iya' => 'вулканизация',        'galli(ts)izm' => 'галлицизм',        'gallyu(ts)ina(ts)iya' => 'галлюцинация',        'galvaniza(ts)iya' => 'гальванизация',        'gastrol-kon(s)ert' => 'гастроль-концерт',        'gaubi(ts)a' => 'гаубица',        'gelio(ts)entrik' => 'гелиоцентрик',        'geno(ts)id' => 'геноцид',        'geo(ts)entrik' => 'геоцентрик',
        'gerbi(ts)idlar' => 'гербицидлар',        'ger(s)' => 'герц',        'ger(s)og' => 'герцог',
        'gia(ts)int' => 'гиацинт',        'gidromeliora(ts)iya' => 'гидромелиорация',        'gidromexaniza(ts)iya' => 'гидромеханизация',        'gidrostan(s)iya' => 'гидростанция',        'gidroelektrostan(s)iya' => 'гидроэлектростанция',        'giperinflya(ts)iya' => 'гиперинфляция',        'gipo(ts)entr' => 'гипоцентр',        'gli(ts)erin' => 'глицерин',
        'glya(ts)iolog' => 'гляциолог',        'glya(ts)iologiya' => 'гляциология',        'gorchi(ts)a' => 'горчица',        'gravita(ts)iya' => 'гравитация',        'grada(ts)iya' => 'градация',
        'guseni(ts)a' => 'гусеница',        'devalva(ts)iya' => 'девальвация',        'degaza(ts)iya' => 'дегазация',        'degenera(ts)iya' => 'дегенерация',        'degustat(s)iya' => 'дегустатция',        'deduk(s)iya' => 'дедукция',        'dezaktiva(ts)iya' => 'дезактивация',        'dezinsek(s)iya' => 'дезинсекция',        'dezinfek(s)iya' => 'дезинфекция',
        'dezinfek(s)iyalamoq' => 'дезинфекцияламоқ',        'deklama(ts)iya' => 'декламация',
        'deklama(ts)iyachi' => 'декламациячи',        'deklara(ts)iya' => 'декларация',        'dekora(ts)iya' => 'декорация',        'delega(ts)iya' => 'делегация',        'delimita(ts)iya' => 'делимитация',        'demarka(ts)iya' => 'демаркация',        'demilitariza(ts)iya' => 'демилитаризация',        'demobiliza(ts)iya' => 'демобилизация',        'denaturaliza(ts)iya' => 'денатурализация',        'denomina(ts)iya' => 'деноминация',        'denonsa(ts)iya' => 'денонсация',        'depilya(ts)iya' => 'депиляция',        'deporta(ts)iya' => 'депортация',        'deratiza(ts)iya' => 'дератизация',        'deriva(ts)ion' => 'деривацион',        'deriva(ts)iya' => 'деривация',        'desika(ts)iya' => 'десикация',        'detona(ts)iya' => 'детонация',        'defini(ts)iya' => 'дефиниция',        'defi(ts)it' => 'дефицит',        'deflya(ts)iya' => 'дефляция',        'defolia(ts)iya' => 'дефолиация',        'deforma(ts)iya' => 'деформация',        'de(ts)igramm' => 'дециграмм',        'de(ts)ilitr' => 'децилитр',        'de(ts)imetr' => 'дециметр',        'dik(s)iya' => 'дикция',        'direk(s)iya' => 'дирекция',        'diskvalifika(ts)iya' => 'дисквалификация',        'diskrimina(ts)iya' => 'дискриминация',        'disloka(ts)iya' => 'дислокация',        'dispropor(s)iya' => 'диспропорция',        'disserta(ts)iya' => 'диссертация',        'dissimilya(ts)iya' => 'диссимиляция',        'disso(ts)ia(ts)iya' => 'диссоциация',        'distan(s)ion' => 'дистанцион',        'distan(s)iya' => 'дистанция',        'distillya(ts)iya' => 'дистилляция',        'differen(s)ial' => 'дифференциал',        'differen(s)ia(ts)iya' => 'дифференциация',        'differen(s)iyalamoq' => 'дифференцияламоқ',        'dota(ts)iya' => 'дотация',        'do(ts)ent' => 'доцент',        'jinoiy-pro(ts)essual' => 'жиноий-процессуал',        'identifika(ts)iya' => 'идентификация',        'izolya(ts)ion' => 'изоляцион',        'izolya(ts)iya' => 'изоляция',        'izolya(ts)iyalamoq' => 'изоляцияламоқ',        'illyumina(ts)iya' => 'иллюминация',        'illyustra(ts)iya' => 'иллюстрация',        'immigra(ts)iya' => 'иммиграция',        'immobiliza(ts)iya' => 'иммобилизация',        'impoten(s)iya' => 'импотенция',        'improviza(ts)iya' => 'импровизация',        'inaugura(ts)iya' => 'инаугурация',        'inventariza(ts)iya' => 'инвентаризация',        'investi(ts)iya' => 'инвестиция',        'ingalya(ts)iya' => 'ингаляция',        'indeksa(ts)iya' => 'индексация',        'induk(s)ion' => 'индукцион',        'induk(s)iya' => 'индукция',        'iner(s)iya' => 'инерция',        'iner(s)iyali' => 'инерцияли',        'inkvizi(ts)iya' => 'инквизиция',        'inkorpora(ts)iya' => 'инкорпорация',        'inkuba(ts)iya' => 'инкубация',        'innova(ts)iya' => 'инновация',        'inspek(s)iya' => 'инспекция',        'instar(s)iya' => 'инстарция',        'instruk(s)iya' => 'инструкция',        'ins(s)enirovka' => 'инсценировка',        'integra(ts)iya' => 'интеграция',        'intelligen(s)iya' => 'интеллигенция',        'interven(s)iya' => 'интервенция',        'interven(s)iyachi' => 'интервенциячи',        'interna(ts)ional' => 'интернационал',        'interna(ts)ionalizm' => 'интернационализм',        'interna(ts)ionalist' => 'интернационалист',        'intoksika(ts)iya' => 'интоксикация',        'intona(ts)ion' => 'интонацион',        'intona(ts)iya' => 'интонация',        'intui(ts)iya' => 'интуиция',        'infek(s)ion' => 'инфекцион',        'infek(s)iya' => 'инфекция',        'inflya(ts)iya' => 'инфляция',        'informa(ts)ion' => 'информацион',        'informa(ts)iya' => 'информация',        'inʼek(s)iya' => 'инъекция',        'irra(ts)ional' => 'иррационал',        'irriga(ts)ion' => 'ирригацион',        'irriga(ts)iya' => 'ирригация',        'kalkulya(ts)iya' => 'калькуляция',        'kal(s)iy' => 'кальций',        'kanaliza(ts)iya' => 'канализация',        'kan(s)eliyariya' => 'канцелиярия',        'kan(s)erogen' => 'канцероген',        'kan(s)ler' => 'канцлер',        'kapitaliza(ts)iya' => 'капитализация',        'kapitulya(ts)iya' => 'капитуляция',        'kassa(ts)iya' => 'кассация',        'katol(s)izm' => 'католцизм',        'kvalifika(ts)iya' => 'квалификация',        'kvar(s)' => 'кварц',        'kvar(s)it' => 'кварцит',        'kvitan(s)iya' => 'квитанция',        'kinokon(s)ert' => 'киноконцерт',        'kinos(s)enariy' => 'киносценарий',       'klassifika(ts)iya' => 'классификация',        'klassi(ts)izm' => 'классицизм',        'koali(ts)ion' => 'коалицион',        'koali(ts)iya' => 'коалиция',        'kodifika(ts)iya' => 'кодификация',        'kollek(s)ioner' => 'коллекционер',        'kollek(s)iya' => 'коллекция',       'kollek(s)iyachchi' => 'коллекцияччи',        'kolon(s)ifra' => 'колонцифра',        'kombina(ts)iya' => 'комбинация',        'kommer(s)iya' => 'коммерция',        'kommunika(ts)iya' => 'коммуникация',        'kommuta(ts)iya' => 'коммутация',        'kompensa(ts)iya' => 'компенсация',        'kompeten(s)iya' => 'компетенция',        'kompilya(ts)iya' => 'компиляция',        'kompozi(ts)ion' => 'композицион',        'kompozi(ts)iya' => 'композиция',        'konvek(s)iya' => 'конвекция',        'konven(s)iya' => 'конвенция',        'konverta(ts)iya' => 'конвертация',        'kondensa(ts)iya' => 'конденсация',        'kondi(ts)iya' => 'кондиция',        'kondi(ts)ioner' => 'кондиционер',        'konkuren(s)iya' => 'конкуренция',        'konserva(ts)iya' => 'консервация',        'konsigna(ts)iya' => 'консигнация',        'konsolida(ts)iya' => 'консолидация',       'konsor(s)ium' => 'консорциум',        'konspira(ts)iya' => 'конспирация',        'konstitu(ts)ion' => 'конституцион',        'konstitu(ts)iya' => 'конституция',        'konstitu(ts)iyaviy' => 'конституциявий',        'konstruk(s)iya' => 'конструкция',        'konsulta(ts)iya' => 'консультация',        'kontrakta(ts)iya' => 'контрактация',        'kontribu(ts)iya' => 'контрибуция',        'kontrrevolyu(ts)ion' => 'контрреволюцион',        'kontrrevolyu(ts)ioner' => 'контрреволюционер',        'kontrrevolyu(ts)iya' => 'контрреволюция',        'konfedera(ts)iya' => 'конфедерация',        'konferen(s)-zal' => 'конференц-зал',        'konferen(s)iya' => 'конференция',        'konfiska(ts)iya' => 'конфискация',        'konfronta(ts)iya' => 'конфронтация',        'konfu(ts)iylik' => 'конфуцийлик',        'konfu(ts)iychilik' => 'конфуцийчилик',        'kon(s)entrat' => 'концентрат',        'kon(s)entratli' => 'концентратли',        'kon(s)entra(ts)ion' => 'концентрацион',        'kon(s)entra(ts)iya' => 'концентрация',        'kon(s)entra(ts)iyalashmoq' => 'концентрациялашмоқ',        'kon(s)entrik' => 'концентрик',        'kon(s)ep(s)iya' => 'концепция',        'kon(s)ern' => 'концерн',        'kon(s)ert' => 'концерт',        'kon(s)ertmeyster' => 'концертмейстер',        'kon(s)essiya' => 'концессия',        'kon(s)lager' => 'концлагерь',        'koopera(ts)iya' => 'кооперация',        'koopta(ts)iya' => 'кооптация',       'koordina(ts)ion' => 'координацион',        'koordina(ts)iya' => 'координация',        'korpora(ts)iya' => 'корпорация',        'korrelya(ts)iya' => 'корреляция',       'korresponden(s)iya' => 'корреспонденция',        'korrup(s)iya' => 'коррупция',        'koeffi(ts)iyent' => 'коэффициент',        'krema(ts)iya' => 'кремация',        'kristalliza(ts)iya' => 'кристаллизация',        'kulmina(ts)ion' => 'кульминацион',        'kulmina(ts)iya' => 'кульминация',        'kultiva(ts)iya' => 'культивация',        'lakta(ts)iya' => 'лактация',        'lamina(ts)iya' => 'ламинация','lan(s)et' => 'ланцет', 'levomi(ts)etin' => 'левомицетин',        'legitima(ts)iya' => 'легитимация',
 'leyko(ts)itlar' => 'лейкоцитлар',  'leyko(ts)itoz' => 'лейкоцитоз',        'lek(s)iya' => 'лекция',        'liberaliza(ts)iya' => 'либерализация',        'li(ts)ey' => 'лицей',        'li(ts)enziya' => 'лицензия',        'lokaliza(ts)iya' => 'локализация',        'loka(ts)iya' => 'локация',        'lo(ts)man' => 'лоцман',        'lyumenis(s)en(s)iya' => 'люменисценция',        'lyute(ts)iy' => 'лютеций',        'manipulya(ts)iya' => 'манипуляция',        'margane(ts)' => 'марганец',        'matri(ts)a' => 'матрица',        'medi(ts)ina' => 'медицина',        'meliora(ts)iya' => 'мелиорация',        'menstrua(ts)iya' => 'менструация',        'metalliza(ts)iya' => 'металлизация',        'metiza(ts)iya' => 'метизация',        'mexaniza(ts)iya' => 'механизация',        'mexaniza(ts)iyalash' => 'механизациялаш',        'mexaniza(ts)iyalashmoq' => 'механизациялашмоқ',        'mexani(ts)izm' => 'механицизм',        'migra(ts)iya' => 'миграция',        'mizans(s)ena' => 'мизансцена',        'militariza(ts)iya' => 'милитаризация',        'mili(ts)ioner' => 'милиционер',        'mili(ts)iya' => 'милиция',        'mili(ts)iyaxona' => 'милицияхона',        'mineraliza(ts)iya' => 'минерализация',        'minonose(ts)' => 'миноносец',        'misti(ts)izm' => 'мистицизм',        'mobiliza(ts)iya' => 'мобилизация',        'moderniza(ts)iya' => 'модернизация',        'moderniza(ts)iyalamoq' => 'модернизацияламоқ',        'modifika(ts)iya' => 'модификация',        'moto(ts)ikl' => 'мотоцикл',        'moto(ts)iklet' => 'мотоциклет',        'moto(ts)ikletchi' => 'мотоциклетчи',        'moto(ts)iklli' => 'мотоциклли',        'moto(ts)iklchi' => 'мотоциклчи',        'multiplika(ts)ion' => 'мультипликацион',        'multiplika(ts)iya' => 'мультипликация',        'muni(ts)ipaliza(ts)iya' => 'муниципализация',        'muni(ts)ipalitet' => 'муниципалитет',        'naviga(ts)iya' => 'навигация',        'naturaliza(ts)iya' => 'натурализация',        'na(ts)ionaliza(ts)iya' => 'национализация',        'nene(ts)' => 'ненец',        'nene(ts)lar' => 'ненецлар',        'nitrogli(ts)erin' => 'нитроглицерин',        'nomina(ts)iya' => 'номинация',        'nostrifika(ts)iya' => 'нострификация',        'nullifika(ts)iya' => 'нуллификация',        'obliga(ts)iya' => 'облигация',        'obroga(ts)iya' => 'оброгация',        'observa(ts)iya' => 'обсервация',        'okkupa(ts)ion' => 'оккупацион',        'okkupa(ts)iya' => 'оккупация',        'okkupa(ts)iyachi' => 'оккупациячи',        'opera(ts)iya' => 'операция',        'opera(ts)iyaviy' => 'операциявий',        'oppozo(ts)ion' => 'оппозоцион',        'oppozi(ts)iya' => 'оппозиция',        'oppozi(ts)iyachi' => 'оппозициячи',        'op(s)ion' => 'опцион',        'ordinare(ts)' => 'ординарец',        'oriyenta(ts)iya' => 'ориентация',        'osteomalya(ts)iya' => 'остеомаляция',        'ofi(ts)er' => 'офицер',        'ofi(ts)iant' => 'официант',        'ofi(ts)iantka' => 'официантка',        'palpa(ts)iya' => 'пальпация',        'pa(ts)iyent' => 'пациент',        'pa(ts)ifizm' => 'пацифизм',        'pa(ts)ifist' => 'пацифист',        'peni(ts)(s)ilin' => 'пениццилин',        'pesti(ts)idlar' => 'пестицидлар',        'peti(ts)iya' => 'петиция',        'petli(ts)a' => 'петлица',        'pigmenta(ts)iya' => 'пигментация',        'pin(s)et' => 'пинцет',        'pi(ts)(s)a' => 'пицца',        'planta(ts)iya' => 'плантация',        'pla(ts)darm' => 'плацдарм',        'pla(ts)kart' => 'плацкарт',        'pla(ts)karta' => 'плацкарта',        'pla(ts)kartali' => 'плацкартали',        'plebis(s)it' => 'плебисцит',        'podstan(s)iya' => 'подстанция',        'pozi(ts)ion' => 'позицион',        'pozi(ts)iya' => 'позиция',        'poli(ts)iya' => 'полиция',        'poli(ts)iyachi' => 'полициячи',        'poli(ts)meyster' => 'полицмейстер',        'pollyu(ts)iya' => 'поллюция',        'populya(ts)iya' => 'популяция',        'por(s)iya' => 'порция',        'poten(s)ial' => 'потенциал',        'prezenta(ts)iya' => 'презентация',        'press-konferen(s)iya' => 'пресс-конференция',        'preferen(s)iya' => 'преференция',        'privatiza(ts)iya' => 'приватизация',        'prin(s)ip' => 'принцип',        'prin(s)ipial' => 'принципиал',        'prin(s)ipiallik' => 'принципиаллик',        'prin(s)ipli' => 'принципли',        'prin(s)ipsiz' => 'принципсиз',        'pri(ts)ep' => 'прицеп',        'provin(s)ializm' => 'провинциализм',        'provin(s)iya' => 'провинция',        'provoka(ts)iya' => 'провокация',        'proyek(s)iya' => 'проекция',        'proyek(s)iyalamoq' => 'проекцияламоқ',        'proklama(ts)iya' => 'прокламация',        'prolonga(ts)iya' => 'пролонгация',        'propor(s)ional' => 'пропорционал',        'propor(s)ionallik' => 'пропорционаллик',        'propor(s)iya' => 'пропорция',        'protek(s)ionizm' => 'протекционизм',        'pro(ts)ent' => 'процент',        'pro(ts)entli' => 'процентли',        'pro(ts)entchi' => 'процентчи',        'pro(ts)ess' => 'процесс',        'pro(ts)essor' => 'процессор',        'pro(ts)essual' => 'процессуал',        'publi(ts)ist' => 'публицист',        'publi(ts)istik' => 'публицистик',        'publi(ts)istika' => 'публицистика',        'punktua(ts)ion' => 'пунктуацион',        'punktua(ts)iya' => 'пунктуация',        'punk(s)iya' => 'пункция',        'radia(ts)ion' => 'радиацион',        'radia(ts)iya' => 'радиация',        'radioloka(ts)iya' => 'радиолокация',        'radionaviga(ts)iya' => 'радионавигация',        'radiostan(s)iya' => 'радиостанция',        'rane(ts)' => 'ранец',        'ratifika(ts)iya' => 'ратификация',        'rafina(ts)iya' => 'рафинация',        'rafina(ts)iyalash' => 'рафинациялаш',        'ra(ts)ion' => 'рацион',        'ra(ts)ional' => 'рационал',        'ra(ts)ionalizator' => 'рационализатор',        'ra(ts)ionalizatorlik' => 'рационализаторлик',        'ra(ts)ionaliza(ts)iya' => 'рационализация',        'ra(ts)ionalizm' => 'рационализм',       'ra(ts)ionalist' => 'рационалист',        'ra(ts)ionlallashmoq' => 'рационлаллашмоқ',        'ra(ts)iya' => 'рация',       'reabilita(ts)iya' => 'реабилитация',        'reak(s)ion' => 'реакцион',        'reak(s)ioner' => 'реакционер',        'reak(s)iya' => 'реакция',        'reak(s)iyachi' => 'реакциячи',        'realiza(ts)iya' => 'реализация',        'reanima(ts)iya' => 'реанимация',        'revalva(ts)iya' => 'ревальвация',        'revolyu(ts)ion' => 'революцион',        'revolyu(ts)ioner' => 'революционер',        'revolyu(ts)iya' => 'революция',        'regenera(ts)iya' => 'регенерация',        'registra(ts)iya' => 'регистрация',        'redak(s)ion' => 'редакцион',        'redak(s)iya' => 'редакция',        'reduk(s)iya' => 'редукция',        'reduplika(ts)iya' => 'редупликация',        'rezek(s)iya' => 'резекция',        'reziden(s)iya' => 'резиденция',        'rezolyu(ts)iya' => 'резолюция',        'reinvesti(ts)iya' => 'реинвестиция',        'rekvizi(ts)iya' => 'реквизиция',        'reklama(ts)iya' => 'рекламация',        'rekognos(s)irovka' => 'рекогносцировка',        'rekomenda(ts)iya' => 'рекомендация',        'rekonstruk(s)iya' => 'реконструкция',        'rekonstruk(s)iyalamoq' => 'реконструкцияламоқ',        'remilitariza(ts)iya' => 'ремилитаризация',        'repara(ts)iya' => 'репарация',        'repatri(ts)iya' => 'репатриция',        'repeti(ts)iya' => 'репетиция',        'reprivatiza(ts)iya' => 'реприватизация',        'reproduk(s)iya' => 'репродукция',        'restavra(ts)iya' => 'реставрация',       'retranslya(ts)iya' => 'ретрансляция',        'reforma(ts)iya' => 'реформация',        'refrak(s)iya' => 'рефракция',        're(ts)enzent' => 'рецензент',        're(ts)enziya' => 'рецензия',        're(ts)ept' => 'рецепт',        're(ts)eptorlar' => 'рецепторлар',        're(ts)idiv' => 'рецидив',        're(ts)idivist' => 'рецидивист',        're(ts)ipiyent' => 'реципиент',        'reevakua(ts)iya' => 'реэвакуация',        'reemigra(ts)iya' => 'реэмиграция',        'ri(ts)arlik' => 'рицарлик',        'ri(ts)ar' => 'рицарь',        'rota(ts)ion' => 'ротацион',        'sana(ts)iya' => 'санация',        'sana(ts)iyalash' => 'санациялаш',        'sank(s)iya' => 'санкция',        'sekre(ts)iya' => 'секреция',        'sek(s)iya' => 'секция',        'selek(s)ion' => 'селекцион',        'selek(s)iya' => 'селекция',        'selek(s)iyachi' => 'селекциячи',        'selek(s)iyachilik' => 'селекциячилик',        'sensa(ts)ion' => 'сенсацион',        'sensa(ts)iya' => 'сенсация',        'signaliza(ts)iya' => 'сигнализация',        'sili(ts)iy' => 'силиций',        'situa(ts)iya' => 'ситуация',        'skepti(ts)izm' => 'скептицизм',        'slane(ts)' => 'сланец',        'so(ts)ial' => 'социал',        'so(ts)ial-demokrat' => 'социал-демократ',        'so(ts)ial-demokratik' => 'социал-демократик',        'so(ts)ial-demokratiya' => 'социал-демократия',        'so(ts)ializa(ts)iya' => 'социализация',        'so(ts)ializm' => 'социализм','so(ts)ialist' => 'социалист', 'so(ts)ialistik' => 'социалистик',        'so(ts)iolingvistika' => 'социолингвистика',        'so(ts)iolog' => 'социолог', 'so(ts)iologik' => 'социологик',        'so(ts)iologiya' => 'социология',        'spekulya(ts)iya' => 'спекуляция',        'spe(ts)ifik' => 'специфик',        'spe(ts)ifika' => 'специфика',        'spe(ts)ifika(ts)iya' => 'спецификация',        'stabiliza(ts)iya' => 'стабилизация',        'stan(s)iya' => 'станция',        'sta(ts)ionar' => 'стационар',        'steriliza(ts)iya' => 'стерилизация',        'stoi(ts)izm' => 'стоицизм',        'stron(s)iy' => 'стронций',        'substan(s)iya' => 'субстанция',        's(s)enariy' => 'сценарий',        's(s)enariychi' => 'сценарийчи',        's(s)enarist' => 'сценарист',        'tabli(ts)a' => 'таблица',        'tan(s)a' => 'танца',        'teleins(s)enirovka' => 'телеинсценировка',        'telekommunika(ts)iya' => 'телекоммуникация',        'telemexaniza(ts)iya' => 'телемеханизация',        'tenden(s)ioz' => 'тенденциоз',        'tenden(s)iozlik' => 'тенденциозлик',        'tenden(s)iya' => 'тенденция',        'tepli(ts)a' => 'теплица',        'teploizolya(ts)iya' => 'теплоизоляция',        'termoizolya(ts)iya' => 'термоизоляция',        'ter(s)et' => 'терцет',        'ter(s)iya' => 'терция',        'texne(ts)iy' => 'технеций',        'tradi(ts)ion' => 'традицион',        'tradi(ts)iya' => 'традиция',        'transkrip(s)ion' => 'транскрипцион',        'transkrip(s)iya' => 'транскрипция',        'transkrip(s)iyalamoq' => 'транскрипцияламоқ',        'translitera(ts)iya' => 'транслитерация',        'translya(ts)ion' => 'трансляцион',        'translya(ts)iya' => 'трансляция',        'transplanta(ts)iya' => 'трансплантация',        'transforma(ts)iya' => 'трансформация',        'transforma(ts)iyalamoq' => 'трансформацияламоқ',        'trape(ts)iya' => 'трапеция',        'trepana(ts)iya' => 'трепанация',        'uborshi(ts)a' => 'уборшица',        'uzurpa(ts)iya' => 'узурпация',        'unifika(ts)iya' => 'унификация',        'unifika(ts)iyalashtirmoq' => 'унификациялаштирмоқ',        'unter-ofi(ts)er' => 'унтер-офицер',        'urbaniza(ts)iya' => 'урбанизация',        'fago(ts)it' => 'фагоцит',        'falsifika(ts)iya' => 'фальсификация',        'farma(ts)evt' => 'фармацевт',        'farma(ts)evtika' => 'фармацевтика',        'farma(ts)iya' => 'фармация',        'federa(ts)iya' => 'федерация',        'fermenta(ts)iya' => 'ферментация',        'film-kon(s)ert' => 'фильм-концерт',        'filtra(ts)iya' => 'фильтрация',        'fiton(s)id' => 'фитонцид',        'forma(ts)iya' => 'формация',        'frak(s)ion' => 'фракцион',        'frak(s)iooner' => 'фракциоонер',        'frak(s)iya' => 'фракция',        'fran(s)iya' => 'франция',        'fran(s)uz' => 'француз',        'fran(s)uzlar' => 'французлар',        'fran(s)uzcha' => 'французча',        'fri(ts)' => 'фриц',        'funk(s)ional' => 'функционал',        'funk(s)iya' => 'функция',        'xemosorb(s)iya' => 'хемосорбция',        'xole(ts)istit' => 'холецистит',        '(s)anga' => 'цанга',        '(s)apfa' => 'цапфа',        '(s)edra' => 'цедра',        '(s)eziy' => 'цезий',        '(s)eytnot' => 'цейтнот',        '(s)ellofan' => 'целлофан',        '(s)elluloid' => 'целлулоид',        '(s)ellyuloza' => 'целлюлоза',        '(s)elsiy' => 'цельсий',        '(s)ement' => 'цемент',        '(s)ementlamoq' => 'цементламоқ',        '(s)enz' => 'ценз',        '(s)enzor' => 'цензор',        '(s)enzura' => 'цензура',        '(s)ent' => 'цент',        '(s)entner' => 'центнер',        '(s)entnerli' => 'центнерли',        '(s)entnerchi' => 'центнерчи',        '(s)entralizm' => 'централизм',        '(s)entrizm' => 'центризм',        '(s)entrist' => 'центрист',        '(s)entrifuga' => 'центрифуга',        '(s)eriy' => 'церий',        '(s)esarka' => 'цесарка',        '(s)ex' => 'цех',        '(s)ian' => 'циан',        '(s)ianli' => 'цианли',        '(s)iviliza(ts)iya' => 'цивилизация',        '(s)igara' => 'цигара',        '(s)ikl' => 'цикл',        '(s)iklik' => 'циклик',        '(s)ikllashtirmoq' => 'цикллаштирмоқ',        '(s)iklli' => 'циклли',        '(s)iklon' => 'циклон',        '(s)iklotron' => 'циклотрон',        '(s)ilindr' => 'цилиндр',        '(s)ilindrik' => 'цилиндрик',        '(s)ilindrli' => 'цилиндрли',        '(s)inga' => 'цинга',        '(s)ink' => 'цинк',        '(s)inkograf' => 'цинкограф',        '(s)inkografiya' => 'цинкография',        '(s)irk' => 'цирк',        '(s)irkoniy' => 'цирконий',        '(s)irkul' => 'циркуль',        '(s)irkulyar' => 'циркуляр',        '(s)irkchi' => 'циркчи',        '(s)irroz' => 'цирроз',        '(s)isterna' => 'цистерна',        '(s)isternali' => 'цистернали',        '(s)istit' => 'цистит',        '(s)itata' => 'цитата',        '(s)itatabozlik' => 'цитатабозлик',        '(s)ito-' => 'цито-',        '(s)itodiagnostika' => 'цитодиагностика',        '(s)itokimyo' => 'цитокимё',        '(s)itoliz' => 'цитолиз',        '(s)itologiya' => 'цитология',        '(s)itrus' => 'цитрус',        '(s)iferblat' => 'циферблат',        '(s)iferblatli' => 'циферблатли',        '(s)okol' => 'цоколь',        '(s)unami' => 'цунами',        'cherepi(ts)a' => 'черепица',        'shvey(s)ar' => 'швейцар',        'shmu(ts)titul' => 'шмуцтитул',        'shni(ts)el' => 'шницель',        'shpri(ts)' => 'шприц',        'shtangen(s)irkul' => 'штангенциркуль',        'evakua(ts)iya' => 'эвакуация',        'evolyu(ts)ion' => 'эволюцион',        'evolyu(ts)iya' => 'эволюция',        'ego(ts)entrizm' => 'эгоцентризм',        'eksguma(ts)iya' => 'эксгумация',        'ekspedi(ts)ion' => 'экспедицион',        'ekspedi(ts)iya' => 'экспедиция',        'ekspedi(ts)iyachi' => 'экспедициячи',        'ekspluata(ts)iya' => 'эксплуатация',        'ekspluata(ts)iyachi' => 'эксплуатациячи',        'ekspozi(ts)iya' => 'экспозиция',        'ekspropria(ts)iya' => 'экспроприация',        'ekstradi(ts)iya' => 'экстрадиция',        'ekstrak(s)iya' => 'экстракция',        'elektrifika(ts)iya' => 'электрификация',        'elektrostan(s)iya' => 'электростанция',        'emansipa(ts)iya' => 'эмансипация',        'emigra(ts)iya' => 'эмиграция',        'emo(ts)ional' => 'эмоционал',        'emo(ts)ionallik' => 'эмоционаллик',        'emo(ts)iya' => 'эмоция',        'empiriokriti(ts)izm' => 'эмпириокритицизм',        'en(s)efalit' => 'энцефалит',        'en(s)efalogramma' => 'энцефалограмма',        'en(s)iklopedik' => 'энциклопедик',        'en(s)iklopedist' => 'энциклопедист',        'en(s)iklopediya' => 'энциклопедия',        'en(s)iklopediyachi' => 'энциклопедиячи',        'epi(ts)entr' => 'эпицентр',        'eritro(ts)itlar' => 'эритроцитлар',        'erudi(ts)iya' => 'эрудиция',        'eskala(ts)iya' => 'эскалация',        'esmine(ts)' => 'эсминец',        'essen(s)iya' => 'эссенция',        'yurisdik(s)iya' => 'юрисдикция',        'yurispruden(s)iya' => 'юриспруденция',        'yusti(ts)iya' => 'юстиция',    );



$SOFT_SIGN_WORDS = array('aviamodel'=> 'авиамодель','avtomagistralavtomat'=> 'автомагистральавтомат',
        'avtomobil'=> 'автомобиль','akvarel'=> 'акварель','alkogol'=> 'алкоголь','albatros'=> 'альбатрос',
        'albom'=> 'альбом','alpinizm'=> 'альпинизм','alpinist'=> 'альпинист','alt'=> 'альт','alternativ'=> 'альтернатив','alternativa'=> 'альтернатива','altimetr'=> 'альтиметр', 'altchi'=> 'альтчи','alfa'=> 'альфа','alfa-zarralar'=> 'альфа-зарралар','alma-terapiya'=>'альма-терапия','alyans'=> 'альянс','amalgama'=> 'амальгама','ansambl'=> 'ансамбль','apelsin'=> 'апельсин','aprel'=> 'апрель','artel'=> 'артель','artikl'=> 'артикль','arergard'=> 'арьергард','asfalt'=> 'асфальт','asfaltlamoq'=> 'асфальтламоқ','asfaltli'=> 'асфальтли', 'atele'=> 'ателье','bazalt'=> 'базальт','balzam'=> 'бальзам','balzamlash'=> 'бальзамлаш','balneolog'=> 'бальнеолог','balneologik'=> 'бальнеологик', 'balneologiya'=> 'бальнеология','balneoterapiya'=> 'бальнеотерапия','balneotexnika'=> 'бальнеотехника','banderol'=> 'бандероль','barelef'=> 'барельеф','barrel'=> 'баррель','barer'=> 'барьер','batalon'=> 'батальон','belveder'=> 'бельведер','belgiyalik'=> 'бельгиялик',        'belting'=> 'бельтинг','beletaj'=> 'бельэтаж','bilyard'=> 'бильярд','binokl'=> 'бинокль', 'biofiltr'=> 'биофильтр','bolonya'=> 'болонья','bolshevizm'=> 'большевизм','bolshevik'=> 'большевик','brakonerlik'=> 'браконьерлик', 'broneavtomobil'=> 'бронеавтомобиль', 'bron'=> 'бронь','budilnik'=> 'будильник','bulvar'=> 'бульвар','buldenej'=> 'бульденеж','buldog'=> 'бульдог','buldozer'=> 'бульдозер','buldozerchi'=> 'бульдозерчи','bulon'=> 'бульон','byulleten'=> 'бюллетень','valeryanka'=> 'валерьянка','valvatsiya'=> 'вальвация','vals'=> 'вальс','vanil'=> 'ваниль','varete'=> 'варьете','vedomost'=> 'ведомость','veksel'=> 'вексель','ventil'=> 'вентиль','vermishel'=> 'вермишель','verner'=> 'верньер','verf'=> 'верфь',        'vestibyul'=> 'вестибюль', 'videofilm'=> 'видеофильм',        'viklyuchatel'=> 'виключатель',        'vinetka'=> 'виньетка','violonchel'=> 'виолончель','vklyuchatel'=> 'включатель','vodevil'=> 'водевиль','volost'=> 'волость','volt'=> 'вольт','volta'=> 'вольта', 'voltli'=> 'вольтли','voltmetr'=> 'вольтметр','volfram'=> 'вольфрам',  'vulgar'=> 'вульгар','vulgarizm'=> 'вульгаризм','vulgarlashtirmoq'=> 'вульгарлаштирмоқ','gavan'=> 'гавань','galvanizatsiya'=> 'гальванизация', 'galvanik'=> 'гальваник','galvanometr'=> 'гальванометр','gantel'=> 'гантель','garmon'=> 'гармонь','gastrol'=> 'гастроль','gastrol-konsert'=> 'гастроль-концерт','gelmint'=> 'гельминт','gelmintoz'=> 'гельминтоз','gelmintologiya'=> 'гельминтология','geraldika'=> 'геральдика','gilza'=> 'гильза','giposulfit'=> 'гипосульфит','golf'=> 'гольф','gorelef'=> 'горельеф','gorizontal'=> 'горизонталь', 'gospital'=> 'госпиталь','grifel'=> 'грифель','guash'=> 'гуашь','daltonizm'=> 'дальтонизм','dvigatel'=> 'двигатель',        'devalvatsiya'=> 'девальвация','dekabr'=> 'декабрь','delta'=> 'дельта','delfin'=> 'дельфин','delfinariy'=> 'дельфинарий','delfinsimonlar'=> 'дельфинсимонлар','detal'=> 'деталь','diagonal'=> 'диагональ','diafilm'=> 'диафильм','dizel'=> 'дизель','dizel-motor'=> 'дизель-мотор','dirijabl'=> 'дирижабль','drel'=> 'дрель', 'duel'=> 'дуэль','jenshen'=> 'женьшень','impuls'=> 'импульс', 'inventar'=> 'инвентарь','insult'=> 'инсульт','intervyu'=> 'интервью', 'interer'=> 'интерьер','italyan'=> 'итальян', 'italyanlar'=> 'итальянлар','italyancha'=> 'итальянча','iyul'=> 'июль','iyun'=> 'июнь','kabel'=> 'кабель','kalendar'=> 'календарь','kalka'=> 'калька','kalkalamoq'=> 'калькаламоқ','kalkulyator'=> 'калькулятор','kalkulyatsiya'=> 'калькуляция','kalsiy'=> 'кальций','kanifol'=> 'канифоль','kapelmeyster'=> 'капельмейстер',        'kapsyul'=> 'капсюль','karamel'=> 'карамель','kartel'=> 'картель','kartech'=> 'картечь','karusel'=> 'карусель','karer'=> 'карьер','kastryul'=> 'кастрюль',        'kastryulka'=> 'кастрюлька','katapulta'=> 'катапульта','kafel'=> 'кафель', 'kinofestival'=> 'кинофестиваль','kinofilm'=> 'кинофильм', 'kisel'=> 'кисель','kitel'=> 'китель','knyaz'=> 'князь','kobalt'=> 'кобальт', 'kokil'=> 'кокиль','kokteyl'=> 'коктейль','kompyuter'=> 'компьютер','kompyuterlashtirmoq'=> 'омпьютерлаштирмоқ','konsultant'=> 'консультант',        'konsultativ'=> 'консультатив','konsultatsiya'=> 'консультация', 'kontrol'=> 'контроль','konferanse'=> 'конферансье', 'konslager'=> 'концлагерь','kon'=> 'конь','konki'=> 'коньки','konkichi'=> 'конькичи', 'konyunktiva'=> 'коньюнктива','konyunktivit'=> 'коньюнктивит','konyunktura'=> 'коньюнктура','konyak'=> 'коньяк','korol'=> 'король','kreml'=> 'кремль','krovat'=> 'кровать','kulminatsion'=> 'кульминацион','kulminatsiya'=> 'кульминация','kultivator'=> 'культиватор','kultivatsiya'=> 'культивация','kulturizm'=> 'культуризм','kurer'=> 'курьер','kyat'=> 'кьят', 'lager'=> 'лагерь','latun'=> 'латунь',        'losos'=> 'лосось', 'loson'=> 'лосьон','magistral'=> 'магистраль', 'marseleza'=> 'марсельеза',        'mebel'=> 'мебель','medal'=> 'медаль', 'medalon'=> 'медальон','melxior'=> 'мельхиор',        'menshevizm'=> 'меньшевизм', 'menshevik'=> 'меньшевик','migren'=> 'мигрень', 'mikroinsult'=> 'микроинсульт','mikrofilm'=> 'микрофильм','model'=> 'модель','modeler'=> 'модельер','molbert'=> 'мольберт','monastir'=> 'монастирь','monokultoura'=> 'монокультоура',        'motel'=> 'мотель','multi-'=> 'мульти-','multimediya'=> 'мультимедия','multimillioner'=> 'мультимиллионер','multiplikatsion'=> 'мультипликацион', 'multiplikator'=> 'мультипликатор',        'multiplikatsiya'=> 'мультипликация','neft'=> 'нефть','nikel'=> 'никель','nimpalto'=> 'нимпальто','nippel'=> 'ниппель','nol'=> 'ноль', 'normal'=> 'нормаль','noyabr'=> 'ноябрь','oblast'=> 'область','okkultizm'=> 'оккультизм','oktabr'=> 'октябрь','otel'=> 'отель','oftalmologiya'=> 'офтальмология','ochered'=> 'очередь','pavilon'=> 'павильон', 'palma'=> 'пальма','palmazor'=> 'пальмазор','palpatsiya'=> 'пальпация','palto'=> 'пальто','paltobop'=> 'пальтобоп','paltolik'=> 'пальтолик','panel'=> 'панель','parallel'=> 'параллель','parol'=> 'пароль','patrul'=> 'патруль','pedal'=> 'педаль','penalti'=> 'пенальти','pechat'=> 'печать','pechene'=> 'печенье','pech'=> 'печь','plastir'=> 'пластирь','povest'=> 'повесть',        'polka'=> 'полька','portfel'=> 'портфель','porshen'=> 'поршень',        'pochtalon'=> 'почтальон', 'predoxranitel'=> 'предохранитель', 'premera'=> 'премьера','premer-ministr'=> 'премьер-министр','press-pape'=> 'пресс-папье', 'press-sekretar'=> 'пресс-секретарь', 'pristan'=> 'пристань','profil'=> 'профиль','pulverizator'=> 'пульверизатор','pulmonologiya'=> 'пульмонология', 'pulpa'=> 'пульпа','pulpit'=> 'пульпит','puls'=> 'пульс','pult'=> 'пульт', 'pesa'=> 'пьеса','radiospektakl'=> 'радиоспектакль','rante'=> 'рантье','revalvatsiya'=> 'ревальвация','revolver'=> 'револьвер','rezba'=> 'резьба','rezbali'=> 'резьбали','relef'=> 'рельеф','rels'=> 'рельс','relsli'=> 'рельсли', 'relssiz'=> 'рельссиз', 'retush'=> 'ретушь','riyel'=> 'риель', 'ritsar'=> 'рицарь','rol'=> 'роль','royal'=> 'рояль','rubilnik'=> 'рубильник', 'rubl'=> 'рубль','rul'=> 'руль','saldo'=> 'сальдо','salto'=> 'сальто','sekretar'=> 'секретарь', 'selderey'=> 'сельдерей', 'seld'=> 'сельдь','sentabr'=> 'сентябрь','senor'=> 'сеньор','senora'=> 'сеньора','sinka'=> 'синька','sinkalamoq'=> 'синькаламоқ','siren'=> 'сирень','skalpel'=> 'скальпель','slesar'=> 'слесарь',  'sobol'=> 'соболь', 'sol'=> 'соль','spektakl'=> 'спектакль', 'spiral'=> 'спираль', 'statya'=> 'статья', 'stelka'=> 'стелька','sterjen'=> 'стержень','stil'=> 'стиль','sudya'=> 'судья','sudyalik'=> 'судьялик','sulfat'=> 'сульфат', 'sulfatlar'=> 'сульфатлар', 'tabel'=> 'табель','talk'=> 'тальк','tekstil'=> 'текстиль', 'telefilm'=> 'телефильм','tigel'=> 'тигель','tokar'=> 'токарь','tol'=> 'толь','tonnel'=> 'тоннель','tunnel'=> 'туннель','tush'=> 'тушь','tyulen'=> 'тюлень','tyul'=> 'тюль','ultimatum'=> 'ультиматум','ultra-'=> 'ультра-','ultrabinafsha'=> 'ультрабинафша','ultramikroskop'=> 'ультрамикроскоп','ultratovush'=> 'ультратовуш','ultraqisqa'=> 'ультрақисқа','umivalnik'=> 'умивальник','util'=> 'утиль','fakultativ'=> 'факультатив','fakultet'=> 'факультет','fakultetlalaro'=> 'акультетлаларо','falsifikator'=> 'фальсификатор', 'falsifikatsiya'=> 'фальсификация', 'fevral'=> 'февраль', 'feldmarshal'=> 'фельдмаршал', 'feldsher'=> 'фельдшер','feldʼeger'=> 'фельдъегерь','feleton'=> 'фельетон','feletonchi'=> 'фельетончи','festival'=> 'фестиваль', 'fizkultura'=> 'физкультура','fizkulturachi'=> 'физкультурачи', 'film'=> 'фильм','film-konsert'=> 'фильм-концерт','filmoskop'=> 'фильмоскоп', 'filmoteka'=> 'фильмотека','filtr'=> 'фильтр','filtratsiya'=> 'фильтрация','filtrlamoq'=> 'фильтрламоқ','filtrli'=> 'фильтрли','folga'=> 'фольга','folklor'=> 'фольклор','folklorist'=> 'фольклорист', 'folkloristika'=> 'фольклористика','folklorchi'=> 'фольклорчи','folklorshunos'=> 'фольклоршунос','folklorshunoslik'=> 'фольклоршунослик','fonar'=> 'фонарь','fortepyano'=> 'фортепьяно', 'xolodilnik'=> 'холодильник','xrustal'=> 'хрусталь','selsiy'=> 'цельсий','sirkul'=> 'циркуль','sokol'=> 'цоколь','chizel'=> 'чизель','shagren'=> 'шагрень','shampun'=> 'шампунь','sherst'=> 'шерсть','shinel'=> 'шинель','shifoner'=> 'шифоньер','shnitsel'=> 'шницель','shpatel'=> 'шпатель','shpilka'=> 'шпилька','shpindel'=> 'шпиндель','shtangensirkul'=> 'штангенциркуль','shtangensirkul'=> 'штангенциркуль','shtapel'=> 'штапель','shtempel'=> 'штемпель','emal'=> 'эмаль','emulsiya'=> 'эмульсия','endshpil'=> 'эндшпиль','eskadrilya'=> 'эскадрилья','yuan'=> 'юань','yuriskonsult'=> 'юрисконсульт','yakor'=> 'якорь','yanvar'=> 'январь',);

$E_WORDS = array('bel(e)taj' => 'бельэтаж','bugun-(e)rta' => 'бугун-эрта',
        'diqqat-(e)ʼtibor' => 'диққат-эътибор', 'ich-(e)t' => 'ич-эт','karat(e)' => 'каратэ',
        'm(e)r' => 'мэр','obroʻ-(e)ʼtiborli' => 'обрў-эътиборли','omon-(e)son' => 'омон-эсон',
        'r(e)ket' => 'рэкет','sut(e)mizuvchilar' => 'сутэмизувчилар','upa-(e)lik' => 'упа-элик',
        'xayr-(e)hson' => 'хайр-эҳсон','qayn(e)gachi' => 'қайнэгачи', );

$SH_WORDS = array('a(sh)ob' => 'асҳоб','mu(sh)af' => 'мусҳаф');

$YO_WORDS = array('general-ma(yo)r' => 'генерал-майор','(yo)g' => 'йог','(yo)ga' => 'йога',
        '(yo)gurt' => 'йогурт','(yo)d' => 'йод','(yo)dlamoq' => 'йодламоқ','(yo)dli' => 'йодли',
        'ma(yo)nez' => 'майонез', 'mikrorayon' => 'микрорайон','ma(yo)r' => 'майор','ra(yo)n' => 'район', );

$YU_WORDS = array( 'mo(yu)pa' => 'мойупа', 'po(yu)stun' => 'пойустун' );

$YA_WORDS = array('po(ya)bzal'=>'пойабзал', 'po(ya)ndoz'=>'пойандоз','po(ya)fzal'=>'пойафзал');

$YE_WORDS = array('i(ye)' => 'ийе','konve(ye)r' => 'конвейер','ple(ye)r' => 'плейер','sta(ye)r' => 'стайер','fo(ye)' => 'фойе');

$SOFT_SIGN_WORDS = array('aviamodel'=> 'авиамодель',        'avtomagistralavtomat'=> 'автомагистральавтомат',        'avtomobil'=> 'автомобиль',        'akvarel'=> 'акварель',
        'alkogol'=> 'алкоголь',        'albatros'=> 'альбатрос',        'albom'=> 'альбом',
        'alpinizm'=> 'альпинизм',        'alpinist'=> 'альпинист',        'alt'=> 'альт',
        'alternativ'=> 'альтернатив',        'alternativa'=> 'альтернатива',        'altimetr'=> 'альтиметр',
        'altchi'=> 'альтчи',        'alfa'=> 'альфа',        'alfa-zarralar'=> 'альфа-зарралар',
        'alma-terapiya'=> 'альма-терапия',        'alyans'=> 'альянс',        'amalgama'=> 'амальгама',
        'ansambl'=> 'ансамбль',        'apelsin'=> 'апельсин',        'aprel'=> 'апрель',
        'artel'=> 'артель',        'artikl'=> 'артикль',        'arergard'=> 'арьергард',
        'asfalt'=> 'асфальт',        'asfaltlamoq'=> 'асфальтламоқ',        'asfaltli'=> 'асфальтли',
        'atele'=> 'ателье',        'bazalt'=> 'базальт',        'balzam'=> 'бальзам',
        'balzamlash'=> 'бальзамлаш',        'balneolog'=> 'бальнеолог',        'balneologik'=> 'бальнеологик',        'balneologiya'=> 'бальнеология',        'balneoterapiya'=> 'бальнеотерапия',
        'balneotexnika'=> 'бальнеотехника',        'banderol'=> 'бандероль',        'barelef'=> 'барельеф',
        'barrel'=> 'баррель',        'barer'=> 'барьер',        'batalon'=> 'батальон',
        'belveder'=> 'бельведер',        'belgiyalik'=> 'бельгиялик',        'belting'=> 'бельтинг',
        'beletaj'=> 'бельэтаж',        'bilyard'=> 'бильярд',        'binokl'=> 'бинокль',
        'biofiltr'=> 'биофильтр',        'bolonya'=> 'болонья',        'bolshevizm'=> 'большевизм',
        'bolshevik'=> 'большевик',        'brakonerlik'=> 'браконьерлик',        'broneavtomobil'=> 'бронеавтомобиль',        'bron'=> 'бронь',        'budilnik'=> 'будильник',
        'bulvar'=> 'бульвар',        'buldenej'=> 'бульденеж',        'buldog'=> 'бульдог',
        'buldozer'=> 'бульдозер',        'buldozerchi'=> 'бульдозерчи',        'bulon'=> 'бульон',
        'byulleten'=> 'бюллетень',        'valeryanka'=> 'валерьянка',        'valvatsiya'=> 'вальвация',
        'vals'=> 'вальс',        'vanil'=> 'ваниль',        'varete'=> 'варьете',        'vedomost'=> 'ведомость',        'veksel'=> 'вексель',        'ventil'=> 'вентиль',        'vermishel'=> 'вермишель',        'verner'=> 'верньер',        'verf'=> 'верфь',        'vestibyul'=> 'вестибюль',        'videofilm'=> 'видеофильм',        'viklyuchatel'=> 'виключатель',
        'vinetka'=> 'виньетка',        'violonchel'=> 'виолончель',        'vklyuchatel'=> 'включатель',
        'vodevil'=> 'водевиль',        'volost'=> 'волость',        'volt'=> 'вольт',        'volta'=> 'вольта',        'voltli'=> 'вольтли',        'voltmetr'=> 'вольтметр',        'volfram'=> 'вольфрам',        'vulgar'=> 'вульгар',        'vulgarizm'=> 'вульгаризм',
        'vulgarlashtirmoq'=> 'вульгарлаштирмоқ',        'gavan'=> 'гавань',        'galvanizatsiya'=> 'гальванизация',        'galvanik'=> 'гальваник',        'galvanometr'=> 'гальванометр',
        'gantel'=> 'гантель',        'garmon'=> 'гармонь',        'gastrol'=> 'гастроль',        'gastrol-konsert'=> 'гастроль-концерт',        'gelmint'=> 'гельминт',        'gelmintoz'=> 'гельминтоз',        'gelmintologiya'=> 'гельминтология',        'geraldika'=> 'геральдика',
        'gilza'=> 'гильза',        'giposulfit'=> 'гипосульфит',        'golf'=> 'гольф',        'gorelef'=> 'горельеф',        'gorizontal'=> 'горизонталь',        'gospital'=> 'госпиталь',
        'grifel'=> 'грифель',        'guash'=> 'гуашь',        'daltonizm'=> 'дальтонизм',        'dvigatel'=> 'двигатель',        'devalvatsiya'=> 'девальвация',        'dekabr'=> 'декабрь',
        'delta'=> 'дельта',        'delfin'=> 'дельфин',        'delfinariy'=> 'дельфинарий',        'delfinsimonlar'=> 'дельфинсимонлар',        'detal'=> 'деталь',
        'diagonal'=> 'диагональ',        'diafilm'=> 'диафильм',        'dizel'=> 'дизель',        'dizel-motor'=> 'дизель-мотор',        'dirijabl'=> 'дирижабль',        'drel'=> 'дрель',
        'duel'=> 'дуэль',        'jenshen'=> 'женьшень',        'impuls'=> 'импульс',        'inventar'=> 'инвентарь',        'insult'=> 'инсульт',        'intervyu'=> 'интервью',
        'interer'=> 'интерьер',        'italyan'=> 'итальян',        'italyanlar'=> 'итальянлар',        'italyancha'=> 'итальянча',        'iyul'=> 'июль',        'iyun'=> 'июнь',
        'kabel'=> 'кабель',        'kalendar'=> 'календарь',        'kalka'=> 'калька',        'kalkalamoq'=> 'калькаламоқ',        'kalkulyator'=> 'калькулятор',        'kalkulyatsiya'=> 'калькуляция',
        'kalsiy'=> 'кальций',        'kanifol'=> 'канифоль',        'kapelmeyster'=> 'капельмейстер',        'kapsyul'=> 'капсюль',        'karamel'=> 'карамель',        'kartel'=> 'картель',
        'kartech'=> 'картечь',        'karusel'=> 'карусель',        'karer'=> 'карьер',
        'kastryul'=> 'кастрюль',        'kastryulka'=> 'кастрюлька',        'katapulta'=> 'катапульта',
        'kafel'=> 'кафель',        'kinofestival'=> 'кинофестиваль',        'kinofilm'=> 'кинофильм',
        'kisel'=> 'кисель',        'kitel'=> 'китель',        'knyaz'=> 'князь',        'kobalt'=> 'кобальт',
        'kokil'=> 'кокиль',        'kokteyl'=> 'коктейль',        'kompyuter'=> 'компьютер',        'kompyuterlashtirmoq'=> 'компьютерлаштирмоқ',        'konsultant'=> 'консультант',        'konsultativ'=> 'консультатив',        'konsultatsiya'=> 'консультация',        'kontrol'=> 'контроль',        'konferanse'=> 'конферансье',        'konslager'=> 'концлагерь',        'kon'=> 'конь',        'konki'=> 'коньки',        'konkichi'=> 'конькичи',        'konyunktiva'=> 'коньюнктива',        'konyunktivit'=> 'коньюнктивит',        'konyunktura'=> 'коньюнктура',        'konyak'=> 'коньяк',        'korol'=> 'король',        'kreml'=> 'кремль',        'krovat'=> 'кровать',        'kulminatsion'=> 'кульминацион',        'kulminatsiya'=> 'кульминация',        'kultivator'=> 'культиватор',        'kultivatsiya'=> 'культивация',
        'kulturizm'=> 'культуризм',        'kurer'=> 'курьер',        'kyat'=> 'кьят',        'lager'=> 'лагерь',        'latun'=> 'латунь',        'losos'=> 'лосось',        'loson'=> 'лосьон',
        'magistral'=> 'магистраль',        'marseleza'=> 'марсельеза',        'mebel'=> 'мебель',       'medal'=> 'медаль',        'medalon'=> 'медальон',        'melxior'=> 'мельхиор',        'menshevizm'=> 'меньшевизм',        'menshevik'=> 'меньшевик',        'migren'=> 'мигрень',        'mikroinsult'=> 'микроинсульт',        'mikrofilm'=> 'микрофильм',        'model'=> 'модель',        'modeler'=> 'модельер',        'molbert'=> 'мольберт',        'monastir'=> 'монастирь',        'monokultoura'=> 'монокультоура',        'motel'=> 'мотель',        'multi-'=> 'мульти-',
        'multimediya'=> 'мультимедия',        'multimillioner'=> 'мультимиллионер',        'multiplikatsion'=> 'мультипликацион',        'multiplikator'=> 'мультипликатор',        'multiplikatsiya'=> 'мультипликация',        'neft'=> 'нефть',        'nikel'=> 'никель',        'nimpalto'=> 'нимпальто',        'nippel'=> 'ниппель',        'nol'=> 'ноль',        'normal'=> 'нормаль',
        'noyabr'=> 'ноябрь',        'oblast'=> 'область',        'okkultizm'=> 'оккультизм',        'oktabr'=> 'октябрь',        'otel'=> 'отель',        'oftalmologiya'=> 'офтальмология',        'ochered'=> 'очередь',        'pavilon'=> 'павильон',        'palma'=> 'пальма',        'palmazor'=> 'пальмазор',        'palpatsiya'=> 'пальпация',        'palto'=> 'пальто',
        'paltobop'=> 'пальтобоп',        'paltolik'=> 'пальтолик',        'panel'=> 'панель',        'parallel'=> 'параллель',        'parol'=> 'пароль',        'patrul'=> 'патруль',        'pedal'=> 'педаль',        'penalti'=> 'пенальти',        'pechat'=> 'печать',
        'pechene'=> 'печенье',        'pech'=> 'печь',        'plastir'=> 'пластирь',        'povest'=> 'повесть',        'polka'=> 'полька',        'portfel'=> 'портфель',        'porshen'=> 'поршень',        'pochtalon'=> 'почтальон',        'predoxranitel'=> 'предохранитель',
        'premera'=> 'премьера',        'premer-ministr'=> 'премьер-министр',        'press-pape'=> 'пресс-папье',        'press-sekretar'=> 'пресс-секретарь',        'pristan'=> 'пристань',
        'profil'=> 'профиль',        'pulverizator'=> 'пульверизатор',        'pulmonologiya'=> 'пульмонология',        'pulpa'=> 'пульпа',        'pulpit'=> 'пульпит',
        'puls'=> 'пульс',        'pult'=> 'пульт',        'pesa'=> 'пьеса',        'radiospektakl'=> 'радиоспектакль',        'rante'=> 'рантье',        'revalvatsiya'=> 'ревальвация',
        'revolver'=> 'револьвер',        'rezba'=> 'резьба',        'rezbali'=> 'резьбали',
        'relef'=> 'рельеф',        'rels'=> 'рельс',        'relsli'=> 'рельсли',        'relssiz'=> 'рельссиз',        'retush'=> 'ретушь',        'riyel'=> 'риель',        'ritsar'=> 'рицарь',        'rol'=> 'роль',        'royal'=> 'рояль',        'rubilnik'=> 'рубильник',
        'rubl'=> 'рубль',        'rul'=> 'руль',        'saldo'=> 'сальдо',        'salto'=> 'сальто',
        'sekretar'=> 'секретарь',        'selderey'=> 'сельдерей',        'seld'=> 'сельдь',        'sentabr'=> 'сентябрь',        'senor'=> 'сеньор',        'senora'=> 'сеньора',        'sinka'=> 'синька',        'sinkalamoq'=> 'синькаламоқ',        'siren'=> 'сирень',        'skalpel'=> 'скальпель',        'slesar'=> 'слесарь',        'sobol'=> 'соболь',        'sol'=> 'соль',
        'spektakl'=> 'спектакль',        'spiral'=> 'спираль',        'statya'=> 'статья',        'stelka'=> 'стелька',        'sterjen'=> 'стержень',        'stil'=> 'стиль',        'sudya'=> 'судья',        'sudyalik'=> 'судьялик',        'sulfat'=> 'сульфат',        'sulfatlar'=> 'сульфатлар',        'tabel'=> 'табель',        'talk'=> 'тальк',        'tekstil'=> 'текстиль',        'telefilm'=> 'телефильм',        'tigel'=> 'тигель',        'tokar'=> 'токарь',
        'tol'=> 'толь',        'tonnel'=> 'тоннель',        'tunnel'=> 'туннель',        'tush'=> 'тушь',
        'tyulen'=> 'тюлень',        'tyul'=> 'тюль',        'ultimatum'=> 'ультиматум',        'ultra-'=> 'ультра-',        'ultrabinafsha'=> 'ультрабинафша',        'ultramikroskop'=> 'ультрамикроскоп',        'ultratovush'=> 'ультратовуш',        'ultraqisqa'=> 'ультрақисқа',
        'umivalnik'=> 'умивальник',        'util'=> 'утиль',        'fakultativ'=> 'факультатив',
        'fakultet'=> 'факультет',        'fakultetlalaro'=> 'факультетлаларо',        'falsifikator'=> 'фальсификатор',        'falsifikatsiya'=> 'фальсификация',        'fevral'=> 'февраль',
        'feldmarshal'=> 'фельдмаршал',        'feldsher'=> 'фельдшер',        'feldʼeger'=> 'фельдъегерь',
        'feleton'=> 'фельетон',        'feletonchi'=> 'фельетончи',        'festival'=> 'фестиваль',
        'fizkultura'=> 'физкультура',        'fizkulturachi'=> 'физкультурачи',
        'film'=> 'фильм',        'film-konsert'=> 'фильм-концерт',        'filmoskop'=> 'фильмоскоп',
        'filmoteka'=> 'фильмотека',        'filtr'=> 'фильтр',        'filtratsiya'=> 'фильтрация',        'filtrlamoq'=> 'фильтрламоқ',        'filtrli'=> 'фильтрли',        'folga'=> 'фольга',
        'folklor'=> 'фольклор',        'folklorist'=> 'фольклорист',        'folkloristika'=> 'фольклористика',        'folklorchi'=> 'фольклорчи',        'folklorshunos'=> 'фольклоршунос',
        'folklorshunoslik'=> 'фольклоршунослик',        'fonar'=> 'фонарь',        'fortepyano'=> 'фортепьяно',        'xolodilnik'=> 'холодильник',        'xrustal'=> 'хрусталь',        'selsiy'=> 'цельсий',        'sirkul'=> 'циркуль',        'sokol'=> 'цоколь',        'chizel'=> 'чизель',
        'shagren'=> 'шагрень',        'shampun'=> 'шампунь',        'sherst'=> 'шерсть',        'shinel'=> 'шинель',        'shifoner'=> 'шифоньер',        'shnitsel'=> 'шницель',        'shpatel'=> 'шпатель',        'shpilka'=> 'шпилька',        'shpindel'=> 'шпиндель',        'shtangensirkul'=> 'штангенциркуль',        'shtangensirkul'=> 'штангенциркуль',
        'shtapel'=> 'штапель',        'shtempel'=> 'штемпель',        'emal'=> 'эмаль',        'emulsiya'=> 'эмульсия',        'endshpil'=> 'эндшпиль',        'eskadrilya'=> 'эскадрилья',        'yuan'=> 'юань',        'yuriskonsult'=> 'юрисконсульт',        'yakor'=> 'якорь',
        'yanvar'=> 'январь',    );


        $compounds_first = array('ch' => 'ч', 'Ch' => 'Ч', 'CH' => 'Ч', 'sh' => 'ш', 'Sh' => 'Ш', 'SH' => 'Ш','yo‘' => 'йў', 'Yo‘' => 'Йў', 'YO‘' => 'ЙЎ');

        $compounds_second = array('yo' => 'ё', 'Yo' => 'Ё', 'YO' => 'Ё','yu' => 'ю', 'Yu' => 'Ю', 'YU' => 'Ю', 'ya' => 'я', 'Ya' => 'Я', 'YA' => 'Я', 'ye' => 'е', 'Ye' => 'Е', 'YE' => 'Е','o‘' => 'ў', 'O‘' => 'Ў', 'oʻ' => 'ў', 'Oʻ' => 'Ў','g‘' => 'ғ', 'G‘' => 'Ғ', 'gʻ' => 'ғ', 'Gʻ' => 'Ғ');

        $beginning_rules = array('ye' => 'е', 'Ye' => 'Е', 'YE' => 'Е','e' => 'э', 'E' => 'Э');

        $after_vowel_rules = array( 'ye' => 'е', 'Ye' => 'Е', 'YE' => 'Е','e' => 'э', 'E' => 'Э');

        $exception_words_rules = array('s' => 'ц', 'S' => 'Ц', 'ts' => 'ц', 'Ts' => 'Ц', 'TS' => 'Ц',
                'e' => 'э', 'E' => 'э', 'sh' => 'сҳ', 'Sh' => 'Сҳ', 'SH' => 'СҲ',
                'yo' => 'йо', 'Yo' => 'Йо', 'YO' => 'ЙО','yu' => 'йу', 'Yu' => 'Йу', 'YU' => 'ЙУ',
                'ya' => 'йа', 'Ya' => 'Йа', 'YA' => 'ЙА' );
            

            

 // Standardize some characters
            $text = str_replace('ʻ', '‘', $text);

 // Replace soft sign words
            $text = preg_replace_callback(
                '/\b('.implode('|', $SOFT_SIGN_WORDS).')\b/u',
                function($matches) {
                    $word = $matches[1];
                    $result = $SOFT_SIGN_WORDS[strtolower($word)] ?? $word;
                    if (ctype_upper($word)) {
                        $result = strtoupper($result);
                    } elseif (ctype_upper($word[0])) {
                        $result = ucfirst($result);
                    }
                    return $result;
                },
                $text
            );
// Replace exception words
            $pattern = '/\b('.implode('|', array_merge(array_keys($TS_WORDS), array_keys($E_WORDS))).')\b/u';
            $text = preg_replace_callback(
                $pattern,
                function($matches) use ($exception_words_rules) {
                    return preg_replace(
                        '/'.$matches[2].'/u',
                        $exception_words_rules[$matches[2]],
                        $matches[1]
                    );
                },
                $text
            );



// Compounds
            $text = preg_replace_callback(
                '/('.implode('|', array_keys($compounds_first)).')/u',
                function($matches) use ($compounds_first) {
                    return $compounds_first[$matches[1]];
                },
                $text
            );

            $text = preg_replace_callback(
                '/('.implode('|', array_keys($compounds_second)).')/u',
                function($matches) use ($compounds_second) {
                    return $compounds_second[$matches[1]];
                },
                $text
            );

            $text = preg_replace_callback(
                '/\b('.implode('|', array_keys($beginning_rules)).')/u',
                function($matches) use ($beginning_rules) {
                    return $beginning_rules[$matches[1]];
                },
                $text
            );

            $text = preg_replace_callback(
                '/('.implode('|', array_merge($LATIN_VOWELS, array_keys($after_vowel_rules))).')('.implode('|', array_keys($after_vowel_rules)).')/u',
                function($matches) use ($after_vowel_rules) {
                    return $matches[1].$after_vowel_rules[$matches[2]];
                },
                $text
            );
            $LATIN_TO_CYRILLIC = $LATIN_TO_CYRILLIC;
            $text = preg_replace_callback(
                '/('.implode('|', array_keys($LATIN_TO_CYRILLIC)).')/u',
                function($matches) use ($LATIN_TO_CYRILLIC) {
                    return $LATIN_TO_CYRILLIC[$matches[1]];
                },
                $text
            );

            return view('transtext',compact('text') );
        }

  





public function to_latin(Request $request) {
        $text = $request->input('title');

        $CYRILLIC_TO_LATIN = array( 'а' => 'a', 'А' => 'A','б' => 'b', 'Б' => 'B','в' => 'v', 'В' => 'V',        'г' => 'g', 'Г' => 'G','д' => 'd', 'Д' => 'D','е' => 'e', 'Е' => 'E','ё' => 'yo', 'Ё' => 'Yo','ж' => 'j', 'Ж' => 'J','з' => 'z', 'З' => 'Z','и' => 'i', 'И' => 'I','й' => 'y', 'Й' => 'Y','к' => 'k', 'К' => 'K','л' => 'l', 'Л' => 'L','м' => 'm', 'М' => 'M','н' => 'n', 'Н' => 'N','о' => 'o', 'О' => 'O','п' => 'p', 'П' => 'P','р' => 'r', 'Р' => 'R','с' => 's', 'С' => 'S','т' => 't', 'Т' => 'T','у' => 'u', 'У' => 'U','ф' => 'f', 'Ф' => 'F','х' => 'x', 'Х' => 'X','ц' => 's', 'Ц' => 'S','ч' => 'ch', 'Ч' => 'Ch','ш' => 'sh', 'Ш' => 'Sh',      'ъ' => 'ʼ', 'Ъ' => 'ʼ','ь' => '', 'Ь' => '','э' => 'e', 'Э' => 'E','ю' => 'yu', 'Ю' => 'Yu','я' => 'ya', 'Я' => 'Ya','ў' => 'oʻ', 'Ў' => 'Oʻ','қ' => 'q', 'Қ' => 'Q','ғ' => 'gʻ', 'Ғ' => 'Gʻ','ҳ' => 'h', 'Ҳ' => 'H',  );

        $CYRILLIC_VOWELS = array('а','А','е','Е','ё','Ё','и','И','о','О','у','У','э','Э','ю','Ю','я','Я','ў', 'Ў');

        $beginning_rules = array( 'ц' => 's', 'Ц' => 'S','е' => 'ye', 'Е' => 'Ye'  );

        $after_vowel_rules = array('ц' => 'ts', 'Ц' => 'Ts','е' => 'ye', 'Е' => 'Ye');

        




        $text = preg_replace_callback(

                '/(сент|окт)([яЯ])(бр)/u',
                
                function($matches) { return $matches[1] . ($matches[2] == 'я' ? 'a' : 'A') . $matches[3];},
                
                $text
        );


        $text = preg_replace_callback(
                '/\b('.implode('|', array_keys($beginning_rules)).')/u',
                function($matches) use ($beginning_rules) {
                    return $beginning_rules[$matches[1]];
                },
                $text
        );


        $text = preg_replace_callback(
                '/('.implode('|', array_merge($CYRILLIC_VOWELS, array_keys($after_vowel_rules))).')('.implode('|', array_keys($after_vowel_rules)).')/u',
                function($matches) use ($after_vowel_rules) {
                    return $matches[1].$after_vowel_rules[$matches[2]];
                },
                $text
        );
            
        $text = preg_replace_callback(
                '/('.implode('|', array_keys($CYRILLIC_TO_LATIN)).')/u',

                function($matches) use ($CYRILLIC_TO_LATIN) {
                    return $CYRILLIC_TO_LATIN[$matches[1]];
                },

                $text
        );


return view('transtext',compact('text') );



        }

       

       
}
