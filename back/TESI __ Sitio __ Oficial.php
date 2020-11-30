<?php
session_start();
if(isset($_GET['hashtx'])){

$hashtx=htmlentities($_GET['hashtx']);
if (isset($_GET['n'])) {
  # code...

  $network=htmlentities($_GET['n']);
  if($network=='m'){
    $red='';
    $url = 'https://mainnet.infura.io/v3/8c810c3259ac467c8b44e6b26e74919a';
  }else{
    $red='rinkeby.';
    $url = 'https://'.$red.'infura.io/v3/8c810c3259ac467c8b44e6b26e74919a';
  }
}else{
    $red='rinkeby.';
    $url = 'https://'.$red.'infura.io/v3/8c810c3259ac467c8b44e6b26e74919a';
    $network='r';
  }
$ch = curl_init($url);

if (strlen($hashtx)<66) {
  
  while(strlen($hashtx)!=66){
    $hashtx.='1';
  }

  //0xf25936734da6f7a767f4be92b519e288a92b1668e09ca63574
}elseif (strlen($hashtx)>66) {
  $hashtx=substr($hashtx, 0,((strlen($hashtx)-66)*-1)-2);
  $hashtx.='B4';
}                           
$data = array(
    'jsonrpc' => '2.0',
    'method' => 'eth_getTransactionByHash',
    'params'=> [$hashtx], 
    'id'=> '1'
);
 $payload = json_encode( $data);
//attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

//set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

//return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//execute the POST request
$result = curl_exec($ch);
//close cURL resource

curl_close($ch);
$result=json_decode($result, true);

//d5ae6bfdc43e769cfd5065e5da83b863b404dff104b1f2a21b29dd55226c36b0
if(array_key_exists("error", $result)||$result["result"]==null){
    $_SESSION["hash"]=false;
}else{
  if($result['result']['to']=='0xe2ec217dce9fbfbdbd6802b062d1bb2f99480ed2'){
    $_SESSION['hash']=substr($result["result"]["input"],138,-36);
    $_SESSION["from"]=$result["result"]["from"];
    $_SESSION["transactionHash"]=$result["result"]["hash"];
    $_SESSION["n"]=$network;
  }else{
    $_SESSION["hash"]=false;
  }
}
}
?>

<!DOCTYPE html>
<!-- saved from url=(0041)http://tesi.org.mx/dir/documentacion.html -->
<html lang="es" class="js svg wf-opensans-i3-active wf-opensans-i4-active wf-opensans-n4-active wf-opensans-n3-active wf-opensans-n6-active wf-opensans-n7-active wf-active"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <style type="text/css">

.style1 {
	font-size: 12px;
	color: #000000;
}
.icon{
  background-image: url('./img/question.png');
}
#paa{
  display: none;

}
#pros{
  width: 30%;
}
div {
  height: auto;
  word-wrap: break-word;
}

  </style>

<meta name="google-site-verification" content="FIJqScZ49fthvBOjVG7gIqorxmsQyPhRdXCXROP9faM">
<script type="text/javascript" src="verifyTX.js"></script>
<script>
var myVar;

function myFunction() {
  myVar = setTimeout(cla, 10);
}

function showPage() {
  document.getElementById("pro").style.display = "none";
  document.getElementById("paa").style.transition="all 2s ease .5s";
  document.getElementById("paa").style.display = "block";
}
function cla() {
  document.getElementById("pros").style.width = "98%";
  document.querySelector('#pros').innerText  = 'Verificando clave pública TESI ';
  myVar = setTimeout(showPage, 2000);
}
</script>

<script async="" src="./TESI __ Sitio __ Oficial_files/analytics.js.descargar"></script><script src="./TESI __ Sitio __ Oficial_files/webfont.js.descargar" type="text/javascript" async=""></script><script type="text/javascript">(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','https://www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-69802193-1', 'auto', {'allowLinker':true}); ga('require', 'linker'); ga('linker:autoLink', ['framework-gb.cdn.gob.mx']);</script><script src="./TESI __ Sitio __ Oficial_files/plugins.js.descargar"></script><script src="./TESI __ Sitio __ Oficial_files/main.js.descargar"></script><script type="text/javascript" src="./TESI __ Sitio __ Oficial_files/prototype.js.descargar"></script>
<script type="text/javascript" src="./TESI __ Sitio __ Oficial_files/scriptaculous.js.descargar"></script><script type="text/javascript" src="./TESI __ Sitio __ Oficial_files/effects.js.descargar"></script>
<script type="text/javascript" src="./TESI __ Sitio __ Oficial_files/modalbox.js.descargar"></script>
<link rel="stylesheet" href="./TESI __ Sitio __ Oficial_files/modalbox.css" type="text/css" media="screen">

  
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <title>TESI :: Sitio :: Oficial</title>

  <!-- CSS  -->
 <link href="./TESI __ Sitio __ Oficial_files/icon" rel="stylesheet">
  <link href="./TESI __ Sitio __ Oficial_files/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="./TESI __ Sitio __ Oficial_files/style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link rel="stylesheet" href="./TESI __ Sitio __ Oficial_files/bootstrap-theme.min.css">
  <link rel="stylesheet" href="./TESI __ Sitio __ Oficial_files/bootstrap.css">
  <link rel="stylesheet" href="./TESI __ Sitio __ Oficial_files/font-awesome.min.css">

  <link href="./TESI __ Sitio __ Oficial_files/main.css" rel="stylesheet">

<script type="text/javascript" src="./TESI __ Sitio __ Oficial_files/modernizr.js.descargar"></script><script type="text/javascript" src="./TESI __ Sitio __ Oficial_files/pace.min.js.descargar"></script><link rel="stylesheet" href="./TESI __ Sitio __ Oficial_files/css" media="all"><style type="text/css">:root .GKJYXHBF2 > .GKJYXHBE2 > .GKJYXHBH5, :root a[href*="mfroute.com/"], :root a[href^="http://ffxitrack.com/"], :root a[href^="http://ad-apac.doubleclick.net/"], :root a[href^="http://www.amazon.co.uk/exec/obidos/external-search?"], :root #\5f _mom_ad_2, :root #rhs_block .mod > .luhb-div > div[data-async-type="updateHotelBookingModule"], :root #\5f _admvnlb_modal_container, :root #MAIN.ShowTopic > .ad, :root a[href^="https://www.arthrozene.com/"][href*="?tid="], :root a[href^="http://pubads.g.doubleclick.net/"], :root .GB3L-QEDGY .GB3L-QEDF- > .GB3L-QEDE-, :root #main_col > #center_col div[style="font-size:14px;margin:0 4px;padding:1px 5px;background:#fff7ed"], :root div[class*="-storyBodyAd-"], :root #center_col > #main > .dfrd > .mnr-c > .c._oc._zs, :root a[href^="http://ul.to/ref/"], :root #\5f _nq__hh[style="display:block!important"], :root a[href^="http://cdn.adstract.com/"], :root div[class^="ads-partner-"], :root #\5f _mom_ad_12, :root a[href^="http://lp.ncdownloader.com/"], :root a[href^="https://fileboom.me/pr/"], :root .inlineNewsletterSubscription + .inlineNewsletterSubscription div[class$="_item"], :root .commercial-unit-desktop-rhs > .iKidV > .Ee92ae + .P2mpm + .hp3sk, :root a[href^="//4c7og3qcob.com/"], :root a[href^="http://join3.bannedsextapes.com/track/"], :root div[id^="google_ads_iframe_"], :root #ads > .dose > .dosesingle, :root a[href^="http://3wr110.net/"], :root a[href^="http://bestorican.com/"], :root div[id^="ad_script_"], :root a[href^="http://get.slickvpn.com/"], :root .gbfwa > div[class$="_item"], :root #assetsListings[style="display: block;"], :root #center_col > #\5f Emc, :root a[href^="http://marketgid.com"], :root #rhs_block > ol > .rhsvw > .kp-blk > .xpdopen > ._OKe > ol > ._DJe > .luhb-div, :root AD-SLOT, :root a[href^="http://go.mobisla.com/"], :root a[href^="http://bodelen.com/"], :root a[href^="http://www.webtrackerplus.com/"], :root #center_col > #res > #topstuff + #search > div > #ires > #rso > #flun, :root a[href^="https://watchmygirlfriend.tv/"], :root a[href^="http://www.affbuzzads.com/affiliate/"], :root #center_col > #resultStats + #tads, :root #main-content > [style="padding:10px 0 0 0 !important;"], :root #center_col > #resultStats + #tads + #res + #tads, :root #cnt #center_col > #taw > #tvcap > .c._oc._Lp, :root a[onmousedown^="this.href='http://staffpicks.outbrain.com/network/redir?"][target="_blank"], :root #center_col > #resultStats + div + #res + #tads, :root div[id^="crt-"][style], :root div[class^="Ad__container"], :root a[href^="http://centertrust.xyz/"], :root a[href^="http://g1.v.fwmrm.net/ad/"], :root a[href^="http://www.fbooksluts.com/"], :root #center_col > #resultStats + div[style="border:1px solid #dedede;margin-bottom:11px;padding:5px 7px 5px 6px"], :root a[href^="http://ads.integral-marketing.com/"], :root #resultspanel > #topads, :root a[href^="https://www.firstload.com/affiliate/"], :root a[href^="https://control.trafficfabrik.com/"], :root #center_col > #taw > #tvcap > .commercial-unit-desktop-top, :root a[href^="http://t.mdn2015x1.com/"], :root #center_col > #taw > #tvcap > .cu-container > .commercial-unit-desktop-top, :root div[id^="advads_"], :root a[data-obtrack^="http://paid.outbrain.com/network/redir?"], :root .__y_inner > .__y_item, :root div[id^="ads300_100-widget"], :root #center_col > #taw > #tvcap > .rscontainer, :root .commercial-unit-mobile-top .jackpot-main-content-container > .UpgKEd + .nZZLFc > .vci, :root #center_col > div[style="font-size:14px;margin-right:0;min-height:5px"] > div[style="font-size:14px;margin:0 4px;padding:1px 5px;background:#fff8e7"], :root a[href^="https://www.financeads.net/tc.php?"], :root #cnt #center_col > #res > #topstuff > .ts, :root a[href^="https://aaucwbe.com/"], :root a[href^="http://espn.zlbu.net/"], :root a[href^="https://ads.trafficpoizon.com/"], :root #content > #center > .dose > .dosesingle, :root #content > #right > .dose > .dosesingle, :root #flowplayer > div[style="position: absolute; width: 300px; height: 275px; left: 222.5px; top: 85px; z-index: 999;"], :root a[href^="http://ads.betfair.com/redirect.aspx?"], :root #flowplayer > div[style="z-index: 208; position: absolute; width: 300px; height: 275px; left: 222.5px; top: 85px;"], :root a[href*="emprestimo.eu"], :root #header + #content > #left > #rlblock_left, :root a[href^="http://9amq5z4y1y.com/"], :root a[href^="https://traffic.bannerator.com/"], :root .__zinit .__y_item, :root a[href^="//40ceexln7929.com/"], :root #mbEnd[cellspacing="0"][cellpadding="0"], :root a[href^="http://banners.victor.com/processing/"], :root #mn #center_col > div > h2.spon:first-child, :root .ch[onclick="ga(this,event)"], :root a[href^="//go.vedohd.org/"], :root #mn #center_col > div > h2.spon:first-child + ol:last-child, :root a[href^="http://affiliate.coral.co.uk/processing/"], :root div[id^="yandex_ad"], :root #mn div[style="position:relative"] > #center_col > ._Ak, :root a[href*=".clksite.com/"], :root #mn div[style="position:relative"] > #center_col > div > ._dPg, :root .__yinit .__y_item, :root a[href^="http://finaljuyu.com/"], :root div[id^="mainads"], :root #rhs_block > .ts[cellspacing="0"][cellpadding="0"][style="padding:0"], :root #rhs_block > #mbEnd, :root a[href^="http://traffic.tc-clicks.com/"], :root #rhs_block .mod > .gws-local-hotels__booking-module, :root #rhs_block .xpdopen > ._OKe > div > .mod > ._yYf, :root a[href^="http://data.ad.yieldmanager.net/"], :root #rhs_block > script + .c._oc._Ve.rhsvw, :root a[data-redirect^="https://paid.outbrain.com/network/redir?"], :root a[href*="deliver.trafficfabrik.com"], :root a[href^="http://track.adform.net/"], :root #tads + div + .c, :root #rhswrapper > #rhssection[border="0"][bgcolor="#ffffff"], :root a[href^="http://admingame.info/"], :root #ssmiwdiv[jsdisplay], :root a[href^="http://www.dealcent.com/register.php?affid="], :root #topstuff > #tads, :root .GFYY1SVD2 > .GFYY1SVC2 > .GFYY1SVF5, :root a[href^="http://www.linkbucks.com/referral/"], :root .GHOFUQ5BG2 > .GHOFUQ5BF2 > .GHOFUQ5BG5, :root .GFYY1SVE2 > .GFYY1SVD2 > .GFYY1SVG5, :root a[href^="https://ad.atdmt.com/"], :root .jobs-information-call-to-action + .jobs-information-call-to-action div[class$="_item"], :root .__ywvr .__y_item, :root a[href^="//00ae8b5a9c1d597.com/"], :root a[href^="http://www.terraclicks.com/"], :root a[href*=".qertewrt.com/"], :root .GJJKPX2N1 > .GJJKPX2M1 > .GJJKPX2P4, :root a[href^="http://s5prou7ulr.com/"], :root .GPMV2XEDA2 > .GPMV2XEDP1 > .GPMV2XEDJBB, :root a[href^="http://4c7og3qcob.com/"], :root a[href^="http://aff.ironsocket.com/"], :root .Mpopup + #Mad > #MadZone, :root aside[itemtype="https://schema.org/WPAdBlock"], :root .__y_elastic .__y_item, :root a[href^="http://www.adxpansion.com"], :root a[href^="http://trk.mdrtrck.com/"], :root .__ywl .__y_item, :root a[href^="https://a.adtng.com/"], :root .icons-rss-feed + .icons-rss-feed div[class$="_item"], :root .l-container > #fishtank, :root a[href^="http://dethao.com/"], :root .lads[width="100%"][style="background:#FFF8DD"], :root iframe[src^="http://cdn2.adexprt.com/"], :root a[href^="https://retiremely.com/"], :root .mod > ._jH + .rscontainer, :root .mw > #rcnt > #center_col > #taw > #tvcap > .c, :root a[href^="http://clicks.binarypromos.com/"], :root .mw > #rcnt > #center_col > #taw > .c, :root .nrelate .nr_partner, :root a[href^="http://tezfiles.com/pr/"], :root [lazy-ad="leftbottom_banner"], :root .ob_container .item-container-obpd, :root a[href^="http://partner.sbaffiliates.com/"], :root a[href^="http://www.firstload.com/affiliate/"], :root a[href^="http://www.myfreepaysite.com/sfw_int.php?aid"], :root a[href^="//srv.buysellads.com/"], :root a[href^="http://click.payserve.com/"], :root a[href^="http://pwrads.net/"], :root .ob_dual_right > .ob_ads_header ~ .odb_div, :root .plistaList > .itemLinkPET, :root a[href^="http://www.download-provider.org/"], :root a[href^="//88d7b6aa44fb8eb.com/"], :root .plistaList > .plista_widget_underArticle_item[data-type="pet"], :root a[href^="http://www.pinkvisualgames.com/?revid="], :root .plista_widget_belowArticleRelaunch_item[data-type="pet"], :root .ra[align="left"][width="30%"], :root a[href^="http://ads.affbuzzads.com/"], :root a[href^="http://promos.bwin.com/"], :root a[href^="http://tracker.mybroadband.co.za/"], :root .ra[align="right"][width="30%"], :root a[href^="http://bs.serving-sys.com/"], :root a[href^="http://api.content.ad/"], :root a[href^="https://www.googleadservices.com/pagead/aclk?"], :root .ra[width="30%"][align="right"] + table[width="70%"][cellpadding="0"], :root a[href^="http://n217adserv.com/"], :root .rc-cta[data-target], :root .rhsvw[style="background-color:#fff;margin:0 0 14px;padding-bottom:1px;padding-top:1px;"], :root a[href^="https://land.rk.com/landing/"], :root .rscontainer > .ellip, :root a[href^="http://refpaano.host/"], :root .widget-pane-section-result[data-result-ad-type], :root a[href^="http://adserver.adtechus.com/"], :root .section-result[data-result-ad-type], :root .trc_rbox .syndicatedItem, :root .trc_rbox_border_elm .syndicatedItem, :root a[href^="http://taboola-"][href*="/redirect.php?app.type="], :root a[href^="https://topoffers.com/"][href*="/?pid="], :root .trc_rbox_div .syndicatedItem, :root .trc_rbox_div .syndicatedItemUB, :root div[id^="div_openx_ad_"], :root .trc_rbox_div a[target="_blank"][href^="http://tab"], :root a[href*=".irtyc.com/"], :root a[href^="//porngames.adult/?SID="], :root a[href^="http://engine.newsmaxfeednetwork.com/"], :root a[href^="https://www.camsoda.com/enter.php?id="], :root a[href*="=exoclick"], :root a[href^="//zenhppyad.com/"], :root a[href^="http://ddownload39.club/"], :root .trc_related_container div[data-item-syndicated="true"], :root .vi-lb-placeholder[title="ADVERTISEMENT"], :root a[href^="http://landingpagegenius.com/"], :root a[href^="//api.ad-goi.com/"], :root a[href^="https://dcs.adgear.com/clicks/"], :root a[href^="http://refer.webhostingbuzz.com/"], :root AD-TRIPLE-BOX, :root ADS-RIGHT, :root a[href^="http://campaign.bharatmatrimony.com/track/"], :root a[href*="/adServe/banners?"], :root AFS-AD, :root a[href^="http://www.myvpn.pro/"], :root a[onmousedown^="this.href='http://paid.outbrain.com/network/redir?"][target="_blank"], :root AMP-AD, :root [onclick^="window.open('window.open('//delivery.trafficfabrik.com/"], :root DFP-AD, :root FBS-AD, :root a[href^="http://clickandjoinyourgirl.com/"], :root div[id^="advads-"], :root a[href^="http://buysellads.com/"], :root LEADERBOARD-AD, :root a[href^="http://sharesuper.info/"], :root [ad-id^="googlead"], :root [href*="//xml.revrtb.com/"], :root a[href^="https://djtcollectorclub.org/"][href*="?affiliate_id="], :root a[href^="http://rekoverr.com/"], :root [href^="https://maskip.co/"], :root [id*="MGWrap"], :root a[href^="//ads.ad-center.com/"], :root a[href^="http://websitedhoome.com/"], :root [id*="MarketGid"], :root a[href^="https://www.pornhat.com/"][rel="nofollow"], :root [id*="ScriptRoot"], :root a[href^="http://secure.cbdpure.com/aff/"], :root a[href^="http://www.seekbang.com/cs/"], :root [id^="bunyad_ads_"], :root [lazy-ad="leftthin_banner"], :root a[onmousedown^="this.href='http://staffpicks.outbrain.com/network/redir?"][target="_blank"] + .ob_source, :root a[href^="http://games.ucoz.ru/"][target="_blank"], :root [lazy-ad="lefttop_banner"], :root [lazy-ad="top_banner"], :root [onclick*="content.ad/"], :root a[href^="http://see-work.info/"], :root a[href^="http://www.graboid.com/affiliates/"], :root a[href^="http://papi.mynativeplatform.com:80/pub2/"], :root [onclick^="window.open('http://adultfriendfinder.com/search/"], :root a[href^="http://www.ducksnetwork.com/"], :root [onclick^="window.open('https://www.brazzersnetwork.com/landing/"], :root a[href^="http://www.bet365.com/"][href*="?affiliate="], :root [src^="/Redirect.a2b?"], :root a[data-oburl^="http://paid.outbrain.com/network/redir?"], :root a[data-oburl^="https://paid.outbrain.com/network/redir?"], :root a[data-redirect^="http://click.plista.com/pets"], :root a[data-redirect^="http://paid.outbrain.com/network/redir?"], :root a[href^="http://go.ad2up.com/"], :root a[href^="http://adtransfer.net/"], :root a[href^="http://adclick.g.doubleclick.net/"], :root a[data-redirect^="this.href='http://paid.outbrain.com/network/redir?"], :root div[class*="_AdInArticle_"], :root a[href^="https://track.clickmoi.xyz/"], :root a[data-url^="http://paid.outbrain.com/network/redir?"], :root a[data-url^="http://paid.outbrain.com/network/redir?"] + .author, :root a[href^="http://ad.yieldmanager.com/"], :root a[href^="http://www.myfreepaysite.com/sfw.php?aid"], :root a[href^="//4f6b2af479d337cf.com/"], :root a[href^="http://lp.ezdownloadpro.info/"], :root a[data-widget-outbrain-redirect^="http://paid.outbrain.com/network/redir?"], :root a[href$="/vghd.shtml"], :root a[href^="http://amzn.to/"] > img[src^="data"], :root a[href*=".adk2x.com/"], :root a[href^="//z6naousb.com/"], :root a[href^="//5e1fcb75b6d662d.com/"], :root a[href*=".adsrv.eacdn.com/"] > img, :root a[href^="//www.mgid.com/"], :root a[href^="http://www.clkads.com/adServe/"], :root a[href^="http://ad.doubleclick.net/"], :root a[href*=".allsports4you.club"], :root a[href^="http://googleads.g.doubleclick.net/pcs/click"], :root a[href^="https://uncensored.game/"], :root a[href*=".approvallamp.club/"], :root a[href^="http://connectlinking6.com/"], :root div[id^="ad-position-"], :root a[href*=".bang.com/"][href*="&aff="], :root a[href*=".clkcln.com/"], :root a[href^="http://guideways.info/"], :root a[href*=".ichlnk.com/"], :root div[class^="largeRectangleAd_"], :root a[href*=".inclk.com/"], :root a[href*=".intab.fun/"], :root a[href^="//awejmp.com/"], :root a[href*=".revimedia.com/"], :root a[href*=".trust.zone"], :root a[href^="http://www.1clickmoviedownloader.info/"], :root a[href^="https://www.friendlyduck.com/AF_"], :root a[href^="http://feeds1.validclick.com/"], :root a[href*="//3wr110.xyz/"], :root a[href^="http://eclkmpsa.com/"], :root a[href*="//ridingintractable.com/"], :root a[href^="http://www.coinducks.com/"], :root div[id^="dfp-ad-"], :root a[href*="/adrotate-out.php?"], :root a[href^="https://servedbyadbutler.com/"], :root a[href*="/cmd.php?ad="], :root a[href*="/servlet/click/zone?"], :root a[href*="5iclx7wa4q.com"], :root a[href^="http://feedads.g.doubleclick.net/"], :root a[href*="=Adtracker"], :root a[href^="http://www.downloadweb.org/"], :root a[href^="http://affiliates.score-affiliates.com/"], :root a[href*="=adscript"], :root div > [class][onclick*=".updateAnalyticsEvents"], :root a[href*="?adlivk="][href*="&refer="], :root a[href^="http://www.afco2go.com/srv.php?"], :root a[onmousedown^="this.href='https://paid.outbrain.com/network/redir?"][target="_blank"] + .ob_source, :root a[href^="http://betahit.click/"], :root a[href^="http://hyperies.info/"], :root iframe[id^="google_ads_frame"], :root a[href*="a2g-secure.com"], :root a[href*="ad2upapp.com/"], :root a[href*="delivery.trafficfabrik.com"], :root a[href^="https://members.linkifier.com/public/affiliateLanding?refCode="], :root a[href^="//www.pd-news.com/"], :root a[href*="googleme.eu"], :root a[href^="http://bonusfapturbo.nmvsite.com/"], :root a[href^="http://www.streamtunerhd.com/signup?"], :root a[href*="onclkds."], :root a[href^="https://badoinkvr.com/"], :root a[href*="pussl3.com"], :root a[href^="https://iactrivago.ampxdirect.com/"], :root a[href^=" http://ads.ad-center.com/"], :root a[href^=" http://n47adshostnet.com/"], :root div[id^="ads300_250-widget"], :root a[href^=" http://www.sex.com/"][href*="&utm_"], :root a[href^="//adbit.co/?a=Advertise&"], :root a[href^="http://secure.signup-way.com/"], :root a[href^="//bwnjijl7w.com/"], :root a[href^="//db52cc91beabf7e8.com/"], :root a[href^="http://tracking.deltamediallc.com/"], :root a[href^="//go.onclasrv.com/"], :root a[href^="//healthaffiliate.center/"], :root a[href^="http://www.revenuehits.com/"], :root a[href^="//jsmptjmp.com/"], :root a[href^="//look.djfiln.com/"], :root a[href^="//medleyads.com/spot/"], :root a[href^="http://onclickads.net/"], :root a[href^="//nlkdom.com/"], :root a[href^="//oardilin.com/"], :root a[href^="http://spygasm.com/track?"], :root a[href^="//voyeurhit.com/cs/"], :root a[href^="http://1phads.com/"], :root div[id^="ads250_250-widget"], :root a[href^="http://2pxg8bcf.top/"], :root a[href^="http://www.clickansave.net/"], :root a[href^="http://360ads.go2cloud.org/"], :root a[href^="http://paid.outbrain.com/network/redir?"], :root a[href^="http://track.affiliatenetwork.co.za/"], :root a[href^="http://45eijvhgj2.com/"], :root a[href^="http://6kup12tgxx.com/"], :root a[href^="http://9nl.es/"], :root a[href^="http://NowDownloadAll.com"], :root a[href^="http://www.sex.com/videos/?utm_"], :root a[href^="http://www.mysuperpharm.com/"], :root a[href^="http://a.adquantix.com/"], :root a[href^="http://a63t9o1azf.com/"], :root a[href^="http://abc2.mobile-10.com/"], :root a[href^="http://ad-emea.doubleclick.net/"], :root a[href^="http://ad.au.doubleclick.net/"], :root a[href^="http://vo2.qrlsx.com/"], :root a[href^="http://adexprt.me/"], :root a[href^="http://adf.ly/?id="], :root a[href^="http://api.ringtonematcher.com/"], :root a[href^="http://adfarm.mediaplex.com/"], :root a[href^="http://www.babylon.com/welcome/index?affID"], :root a[href^="http://adserving.unibet.com/"], :root a[href^="https://secure.adnxs.com/clktrb?"], :root a[href^="http://adlev.neodatagroup.com/"], :root a[href^="http://adprovider.adlure.net/"], :root a[href^="http://pan.adraccoon.com?"], :root div[id^="lazyad-"], :root a[href^="http://bcp.crwdcntrl.net/"], :root a[href^="http://adrunnr.com/"], :root a[href^="http://www.fpcTraffic2.com/blind/in.cgi?"], :root a[href^="http://ads.activtrades.com/"], :root a[href^="http://mmo123.co/"], :root div[class^="index_adAfterContent_"], :root a[href^="http://ads.ad-center.com/"], :root a[href^="http://ads.sprintrade.com/"], :root a[href^="http://zevera.com/afi.html"], :root a[href^="http://ads.expekt.com/affiliates/"], :root a[href^="http://ads.pheedo.com/"], :root a[href^="http://ads2.williamhill.com/redirect.aspx?"], :root a[href^="http://cwcams.com/landing/click/"], :root a[href^="http://adserver.adreactor.com/"], :root a[href^="http://adserver.adtech.de/"], :root a[href^="http://www.1clickdownloader.com/"], :root a[href^="http://cdn3.adbrau.com/"], :root a[href^="http://adserver.itsfogo.com/"], :root a[href^="http://adserving.liveuniversenetwork.com/"], :root a[href^="http://adsrv.keycaptcha.com"], :root a[href^="http://adtrack123.pl/"], :root a[href^="http://green.trafficinvest.com/"], :root a[href^="http://clickserv.sitescout.com/"], :root a[href^="http://adtrackone.eu/"], :root a[href^="http://adultfriendfinder.com/p/register.cgi?pid="], :root a[href^="http://linksnappy.com/?ref="], :root a[href^="http://affiliate.glbtracker.com/"], :root a[href^="http://affiliate.godaddy.com/"], :root a[href^="http://www.accuserveadsystem.com/accuserve-go.php?"], :root a[href^="https://sexdatingz.live/"], :root a[href^="http://lp.ilivid.com/"], :root a[href^="http://searchtabnew.com/"], :root a[href^="http://affiliates.pinnaclesports.com/processing/"], :root div[id^="block-views-topheader-ad-block-"], :root a[href^="http://www.gamebookers.com/cgi-bin/intro.cgi?"], :root a[href^="http://aflrm.com/"], :root a[href^="http://anonymous-net.com/"], :root a[href^="http://mojofun.info/"], :root a[href^="http://findersocket.com/"], :root iframe[src^="http://ad.yieldmanager.com/"], :root a[href^="http://at.atwola.com/"], :root a[href^="http://record.sportsbetaffiliates.com.au/"], :root a[href^="http://azmobilestore.co/"], :root a[href^="http://easydownload4you.com/"], :root a[href^="http://www.moneyducks.com/"], :root a[href^="http://b.bestcompleteusa.info/"], :root a[href^="http://bc.vc/?r="], :root a[href^="http://bcntrack.com/"], :root a[href^="http://pokershibes.com/index.php?ref="], :root a[href^="http://www.friendlyadvertisements.com/"], :root div[id^="ads300_600-widget"], :root a[href^="http://bestchickshere.com/"], :root a[href^="http://bluehost.com/track/"], :root a[href^="https://jmp.awempire.com/"], :root a[href^="http://databass.info/"], :root a[href^="http://c.actiondesk.com/"], :root a[href^="http://c.jumia.io/"], :root a[href^="http://c.ketads.com/"], :root a[href^="http://www.bet365.com/"][href*="&affiliate="], :root a[href^="http://callville.xyz/"], :root a[href^="http://media.paddypower.com/redirect.aspx?"], :root a[href^="http://campaign.bharatmatrimony.com/cbstrack/"], :root a[href^="http://campeeks.com/"][href*="&utm_"], :root a[href^="http://casino-x.com/?partner"], :root a[href^="http://cdn.adsrvmedia.net/"], :root a[href^="https://land.brazzersnetwork.com/landing/"], :root a[href^="http://web.adblade.com/"], :root div[data-subscript="Advertising"], :root a[href^="http://cdn3.adexprts.com/"], :root a[href^="http://go.oclaserver.com/"], :root a[href^="http://chaturbate.com/affiliates/"], :root script[src^="http://free-shoutbox.net/app/webroot/shoutbox/sb.php?shoutbox="] + #freeshoutbox_content, :root div[itemtype="http://schema.org/WPAdBlock"], :root a[href^="http://cinema.friendscout24.de?"], :root a[href^="http://click.guamwnvgashbkashawhgkhahshmashcas.pw/"], :root a[href^="http://www.down1oads.com/"], :root a[href^="http://www.streamate.com/exports/"], :root a[href^="http://click.plista.com/pets"], :root a[href^="http://www.pheedo.com/"], :root a[href^="http://clicks.guamwnvgashbkashawhgkhahshmashcas.pw/"], :root a[href^="http://clk.directrev.com/"], :root a[href^="http://galleries.pinballpublishernetwork.com/"], :root div[class^="lifeOnwerAd"], :root a[target="_blank"][href^="http://api.taboola.com/"], :root a[href^="http://clkmon.com/adServe/"], :root a[href^="http://hdplugin.flashplayer-updates.com/"], :root a[href^="http://track.incognitovpn.com/"], :root div[id^="acm-ad-tag-"], :root a[href^="https://www.brazzersnetwork.com/landing/"], :root a[href^="http://codec.codecm.com/"], :root a[href^="http://n.admagnet.net/"], :root a[href^="http://prochina.space/"], :root a[href^="http://contractallsticker.net/"], :root a[href^="http://wgpartner.com/"], :root a[href^="https://go.stripchat.com/"][href*="&campaignId="], :root a[href^="http://cpaway.afftrack.com/"], :root a[href^="http://d2.zedo.com/"], :root div[id^="advt-"], :root a[href^="https://affiliates.bet-at-home.com/processing/"], :root a[href^="http://data.committeemenencyclopedicrepertory.info/"], :root div[class^="Ad__bigBox"], :root a[href^="http://data.linoleictanzaniatitanic.com/"], :root div[itemtype="http://www.schema.org/WPAdBlock"], :root a[href^="http://dftrck.com/"], :root a[href^="http://down1oads.com/"], :root a[href^="http://download-performance.com/"], :root a[href^="http://www.myfreecams.com/?co_id="][href*="&track="], :root a[href^="https://bs.serving-sys.com"], :root a[href^="http://duckcash.eu/"], :root a[href^="http://server.cpmstar.com/click.aspx?poolid="], :root a[href^="https://track.themadtrcker.com/"], :root a[href^="http://dwn.pushtraffic.net/"], :root a[href^="http://earandmarketing.com/"], :root a[href^="https://gogoman.me/"], :root a[href^="http://elite-sex-finder.com/?"], :root a[href^="https://transfer.xe.com/signup/track/redirect?"], :root a[href^="http://elitefuckbook.com/"], :root a[href^="http://ethfw0370q.com/"], :root a[href^="http://extra.bet365.com/"][href*="?affiliate="], :root a[href^="http://farm.plista.com/pets"], :root a[href^="http://freesoftwarelive.com/"], :root div[data-mediatype="advertising"], :root a[href^="http://webgirlz.online/landing/"], :root a[href^="http://fileloadr.com/"], :root a[href^="https://secure.eveonline.com/ft/?aid="], :root a[href^="http://fileupnow.rocks/"], :root a[href^="http://prousa.work/"], :root a[href^="http://fsoft4down.com/"], :root a[href^="http://track.trkvluum.com/"], :root a[href^="https://bullads.net/get/"], :root a[href^="http://fusionads.net"], :root a[href^="https://farm.plista.com/pets"], :root a[href^="http://galleries.securewebsiteaccess.com/"], :root a[href^="http://gca.sh/user/register?ref="], :root a[href^="http://www.on2url.com/app/adtrack.asp"], :root a[href^="http://getlinksinaseconds.com/"], :root a[href^="https://bongacams2.com/track?"], :root a[href^="http://go.seomojo.com/tracking202/"], :root a[href^="http://go.trafficshop.com/"], :root a[href^="http://www.getyourguide.com/?partner_id="], :root a[href^="http://goldmoney.com/?gmrefcode="], :root a[href^="http://greensmoke.com/"], :root a[href^="http://hd-plugins.com/download/"], :root a[href^="http://hpn.houzz.com/"], :root a[href^="http://tracking.crazylead.com/"], :root a[href^="http://hyperlinksecure.com/go/"], :root a[href^="http://igromir.info/"], :root a[href^="https://awejmp.com/"], :root a[href^="http://imads.integral-marketing.com/"], :root a[href^="http://install.securewebsiteaccess.com/"], :root a[href^="http://secure.signup-page.com/"], :root a[href^="http://www.brightwheel.info/"], :root a[href^="http://www.greenmangaming.com/?tap_a="], :root a[href^="http://intent.bingads.com/"], :root a[href^="http://internalredirect.site/"], :root a[href^="http://istri.it/?"], :root a[href^="http://jobitem.org/"], :root a[href^="http://liversely.com/"], :root a[href^="http://k2s.cc/code/"], :root a[href^="http://tracking.toroadvertising.com/"], :root a[href^="http://k2s.cc/pr/"], :root a[href^="http://keep2share.cc/pr/"], :root a[href^="http://latestdownloads.net/download.php?"], :root div[id^="ADV-SLOT-"], :root a[href^="http://liversely.net/"], :root a[href^="http://t.mdn2015x2.com/"], :root a[href^="http://mgid.com/"], :root a[href^="http://www.freefilesdownloader.com/"], :root a[href^="http://mo8mwxi1.com/"], :root div[class^="gemini-ad"], :root a[href^="http://online.ladbrokes.com/promoRedirect?"], :root a[href^="https://redirect.ero-advertising.com/"], :root a[href^="http://play4k.co/"], :root div[id^="ad-div-"], :root a[href^="http://popup.taboola.com/"], :root a[href^="http://uploaded.net/ref/"], :root a[href^="https://www.spyoff.com/"], :root a[href^="http://prochina.link/"], :root a[href^="http://record.betsafe.com/"], :root a[href^="http://record.commissionking.com/"], :root a[href^="http://s9kkremkr0.com/"], :root a[href^="http://www.123-reg.co.uk/affiliate2.cgi"], :root a[href^="http://secure.hostgator.com/~affiliat/"], :root a[href^="http://serve.williamhill.com/promoRedirect?"], :root a[href^="http://servicegetbook.net/"], :root a[href^="http://srvpub.com/"], :root a[href^="https://porngames.adult/?SID="], :root a[href^="http://stateresolver.link/"], :root a[href^="http://www.drowle.com/"], :root a[href^="https://keep2share.cc/pr/"], :root a[href^="http://steel.starflavor.bid/"], :root a[href^="https://www.adskeeper.co.uk/"], :root a[href^="http://syndication.exoclick.com/"], :root a[href^="http://t.mdn2015x3.com/"], :root a[href^="http://t.wowtrk.com/"], :root a[href^="http://tour.affbuzzads.com/"], :root a[href^="http://us.marketgid.com"], :root a[href^="http://vinfdv6b4j.com/"], :root a[href^="http://webtrackerplus.com/"], :root a[href^="http://wopertific.info/"], :root div[id^="cns_ads_"], :root a[href^="http://www.twinplan.com/AF_"], :root a[href^="http://www.TwinPlan.com/AF_"], :root a[href^="http://www.afgr3.com/"], :root a[href^="http://www.adbrite.com/mb/commerce/purchase_form.php?"], :root a[href^="http://www.adskeeper.co.uk/"], :root a[href^="https://understandsolar.com/signup/?lead_source="][href*="&tracking_code="], :root a[href^="http://www.affiliates1128.com/processing/"], :root a[href^="http://www.downloadplayer1.com/"], :root a[href^="http://www.afgr2.com/"], :root a[href^="http://www.badoink.com/go.php?"], :root a[href^="http://www.bitlord.me/share/"], :root a[href^="http://www.bluehost.com/track/"] > img, :root bottomadblock, :root a[href^="https://bnsjb1ab1e.com/"], :root a[href^="http://www.cash-duck.com/"], :root a[href^="http://www.friendlyduck.com/AF_"], :root a[href^="https://windscribe.com/promo/"], :root a[href^="http://yads.zedo.com/"], :root a[href^="http://www.cdjapan.co.jp/aff/click.cgi/"], :root a[href^="http://www.dl-provider.com/search/"], :root a[href^="http://www.downloadthesefiles.com/"], :root a[href^="http://www.duckcash.eu/"], :root a[href^="http://www.duckssolutions.com/"], :root a[href^="http://www.easydownloadnow.com/"], :root a[href^="http://www.epicgameads.com/"], :root a[href^="http://www.faceporn.net/free?"], :root a[href^="http://www.fducks.com/"], :root a[href^="https://torguard.net/aff.php"], :root a[href^="http://www.firstclass-download.com/"], :root a[href^="http://www.firstload.de/affiliate/"], :root a[href^="http://www.fonts.com/BannerScript/"], :root a[href^="http://www.flashx.tv/downloadthis"], :root a[href^="http://www.fleshlight.com/"], :root a[href^="http://www.friendlyquacks.com/"], :root a[href^="https://www.goldenfrog.com/vyprvpn?offer_id="][href*="&aff_id="], :root a[href^="http://www.hitcpm.com/"], :root a[href^="https://pubads.g.doubleclick.net/"], :root a[href^="http://www.idownloadplay.com/"], :root a[href^="http://www.incredimail.com/?id="], :root a[href^="https://tracking.truthfinder.com/?a="], :root a[href^="http://www.installads.net/"], :root a[href^="http://www.ireel.com/signup?ref"], :root a[href^="http://www.liutilities.com/"], :root a[href^="http://www.liversely.net/"], :root a[href^="http://www.menaon.com/installs/"], :root a[href^="http://www.mobileandinternetadvertising.com/"], :root a[href^="http://www.my-dirty-hobby.com/?sub="], :root a[href^="http://www.paddypower.com/?AFF_ID="], :root a[href^="http://www.pinkvisualpad.com/?revid="], :root a[href^="http://www.plus500.com/?id="], :root header#hdr + #main > div[data-hveid], :root a[href^="http://www.quick-torrent.com/download.html?aff"], :root a[href^="http://www.ragazzeinvendita.com/?rcid="], :root a[href^="http://www.richducks.com/"], :root a[href^="http://www.ringtonematcher.com/"], :root a[href^="http://www.roboform.com/php/land.php"], :root a[href^="http://www.securegfm.com/"], :root a[href^="http://www.sex.com/?utm_"], :root a[href^="http://www.sex.com/pics/?utm_"], :root div[class^="Ad__adContainer"], :root a[href^="http://www.sexgangsters.com/?pid="], :root a[href^="http://www.sfippa.com/"], :root a[href^="http://www.socialsex.com/"], :root a[href^="http://www.text-link-ads.com/"], :root a[href^="http://www.tirerack.com/affiliates/"], :root a[href^="http://www.torntv-downloader.com/"], :root a[href^="http://www.torntvdl.com/"], :root a[href^="http://www.uniblue.com/cm/"], :root a[href^="http://www.urmediazone.com/signup"], :root a[href^="http://www.usearchmedia.com/signup?"], :root a[href^="https://secure.cbdpure.com/aff/"], :root a[href^="http://www.wantstraffic.com/"], :root a[href^="http://www.xmediaserve.com/"], :root a[href^="http://www.yourfuckbook.com/?"], :root a[href^="http://www.zergnet.com/i/"], :root a[onclick*="//m.economictimes.com/etmack/click.htm"], :root a[href^="http://www1.clickdownloader.com/"], :root a[href^="http://www5.smartadserver.com/call/pubjumpi/"], :root a[href^="http://wxdownloadmanager.com/dl/"], :root a[href^="http://xads.zedo.com/"], :root a[href^="http://xtgem.com/click?"], :root div[id^="div-adtech-ad-"], :root div[id^="ad-gpt-"], :root a[href^="http://y1jxiqds7v.com/"], :root div[id^="div_ad_stack_"], :root a[href^="http://z1.zedo.com/"], :root a[href^="https://ad.doubleclick.net/"], :root a[href^="https://adclick.g.doubleclick.net/"], :root a[href^="https://adhealers.com/"], :root a[href^="https://ads.ad4game.com/"], :root a[href^="https://adserver.adreactor.com/"], :root a[href^="https://www.incontri-matura.com/"], :root a[href^="https://adultfriendfinder.com/go/page/landing"], :root a[href^="https://adswick.com/"], :root a[href^="https://atomidownload.com/"], :root a[href^="https://awentw.com/"], :root a[href^="https://betway.com/"][href*="&a="], :root a[href^="https://chaturbate.com/in/?track="], :root a[href^="https://chaturbate.com/affiliates/"], :root a[href^="https://chaturbate.com/in/?tour="], :root a[href^="https://chaturbate.jjgirls.com/"][href*="?tour="], :root a[href^="https://chaturbate.xyz/"], :root a[href^="https://click.plista.com/pets"], :root a[href^="https://clixtrac.com/"], :root a[href^="https://dediseedbox.com/clients/aff.php?"], :root a[href^="https://dltags.com/"], :root a[href^="https://evaporate.pw/"], :root td[valign="top"] > .mainmenu[style="padding:10px 0 0 0 !important;"], :root a[href^="https://flirtaescopa.com/"], :root a[href^="https://freeadult.games/"], :root a[href^="https://intrev.co/"], :root a[href^="https://gamescarousel.com/"], :root a[href^="https://m.do.co/c/"] > img, :root a[href^="https://gghf.mobi/"], :root a[href^="https://go.ad2up.com/"], :root a[href^="https://go.onclasrv.com/"], :root a[href^="https://go.trkclick2.com/"], :root a[href^="https://googleads.g.doubleclick.net/pcs/click"], :root a[href^="https://iac.ampxdirect.com/"], :root a[href^="https://ilovemyfreedoms.com/"][href*="?affiliate_id="], :root a[href^="https://incisivetrk.cvtr.io/click?"], :root a[href^="https://landing1.brazzersnetwork.com"], :root a[href^="https://lingthatsparleso.info/"], :root a[href^="https://medleyads.com/"], :root a[href^="https://mk-ads.com/"], :root a[href^="https://mk-cdn.net/"], :root a[href^="https://paid.outbrain.com/network/redir?"], :root a[href^="https://playuhd.host/"], :root a[href^="https://zononi.com/"], :root a[href^="https://porndeals.com/?track="], :root a[href^="https://prf.hn/click/"][href*="/adref:"], :root a[href^="https://refpaano.host/"], :root a[href^="https://www.moscarossa.biz/"], :root a[href^="https://rev.adsession.com/"], :root a[href^="https://secure.bstlnk.com/"], :root a[href^="https://spygasm.com/track?"], :root a[href^="https://squren.com/rotator/?atomid="], :root a[href^="https://syndication.exoclick.com/splash.php?"], :root a[href^="https://t.mobtya.com/"], :root a[href^="https://track.52zxzh.com/"], :root a[href^="https://track.adform.net/"], :root a[href^="https://track.healthtrader.com/"], :root a[href^="https://track.trkinator.com/"], :root div[id^="ad-server-"], :root a[href^="https://trackjs.com/?utm_source"], :root a[href^="https://trafficmedia.center/"], :root a[href^="https://trklvs.com/"], :root a[href^="https://trust.zone/go/r.php?RID="], :root a[href^="https://www.oboom.com/ad/"], :root a[href^="https://uncensored3d.com/"], :root p[id^="div-gpt-ad-"], :root a[href^="https://vodexor.us/"], :root a[href^="https://www.adultempire.com/"][href*="?partner_id="], :root a[href^="https://www.adxtro.com/"], :root a[href^="https://www.bebi.com"], :root a[href^="https://www.camyou.com/?cam="][href*="&track="], :root a[href^="https://www.dsct1.com/"], :root a[href^="https://www.nutaku.net/signup/landing/"], :root a[href^="https://www.popads.net/users/"], :root a[href^="https://www.share-online.biz/affiliate/"], :root a[href^="https://www.what-sexdating.com/"], :root a[onmousedown^="this.href='/wp-content/embed-ad-content/"], :root a[onmousedown^="this.href='http://paid.outbrain.com/network/redir?"][target="_blank"] + .ob_source, :root a[onmousedown^="this.href='https://paid.outbrain.com/network/redir?"][target="_blank"], :root div[id^="div-gpt-ad"], :root a[style="display:block;width:300px;min-height:250px"][href^="http://li.cnet.com/click?"], :root a[target="_blank"][onmousedown="this.href^='http://paid.outbrain.com/network/redir?"], :root aside[id^="adrotate_widgets-"], :root aside[id^="advads_ad_widget-"], :root aside[id^="div-gpt-ad"], :root aside[id^="tn_ads_widget-"], :root div[class$="dealnews"] > .dealnews, :root div[class^="AdhesionAd_"], :root div[class^="BlockAdvert-"], :root div[class^="ResponsiveAd-"], :root div[class^="ad_border_"], :root div[class^="ad_position_"], :root div[class^="adbanner_"], :root div[class^="adpubs-"], :root div[class^="awpcp-random-ads"], :root div[class^="backfill-taboola-home-slot-"], :root div[class^="block-openx-"], :root div[class^="index_adBeforeContent_"], :root div[class^="index_displayAd_"], :root div[class^="local-feed-banner-ads"], :root div[class^="pane-google-admanager-"], :root div[class^="proadszone-"], :root div[data-ad-underplayer], :root div[data-flt-ve="sponsored_search_ads"], :root div[data-native_ad], :root div[data-spotim-slot], :root div[id^="YFBMSN"], :root div[id^="ad-cid-"], :root div[id^="proadszone-"], :root div[id^="ad_bigbox_"], :root div[id^="adfox_"], :root div[id^="adrotate_widgets-"], :root div[id^="ads120_600-widget"], :root div[id^="adspot-"], :root div[id^="dfp-slot-"], :root div[id^="div-ads-"], :root div[id^="dmRosAdWrapper"], :root topadblock, :root div[id^="drudge-column-ads-"], :root div[id^="google_dfp_"], :root div[id^="q1-adset-"], :root div[id^="tms-ad-dfp-"], :root div[id^="zergnet-widget"], :root div[role="navigation"] + c-wiz > div > .kxhcC, :root div[role="navigation"] + c-wiz > script + div > .kxhcC, :root iframe[id^="google_ads_iframe"], :root iframe[src^="http://cdn1.adexprt.com/"], :root iframe[src^="http://static.mozo.com.au/strips/"], :root img[alt^="Fuckbook"], :root input[onclick^="window.open('http://www.friendlyduck.com/"], :root input[onclick^="window.open('http://www.FriendlyDuck.com/"] { display: none !important; }</style><script type="text/javascript" charset="UTF-8" src="./TESI __ Sitio __ Oficial_files/common.js.descargar"></script><script type="text/javascript" charset="UTF-8" src="./TESI __ Sitio __ Oficial_files/util.js.descargar"></script><script type="text/javascript" charset="UTF-8" src="./TESI __ Sitio __ Oficial_files/AuthenticationService.Authenticate"></script></head>
<body style="font-family: sans-serif;" class="white accent-1  pace-done" onload="myFunction()"><header><nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"><div class="container"><div class="navbar-header"><button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarMainCollapse"><span class="sr-only">Interruptor de Navegación</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" style="padding-left: 8px;" href="https://www.gob.mx/"><img src="./TESI __ Sitio __ Oficial_files/gobmxlogo-2.svg" width="75" height="23" alt="Página de inicio, Gobierno de México"></a></div><div class="collapse navbar-collapse" id="navbarMainCollapse"><ul class="nav navbar-nav navbar-right"><li><a href="https://www.gob.mx/tramites" title="Trámites">Trámites</a></li><li><a href="https://www.gob.mx/gobierno" title="Gobierno">Gobierno</a></li><li><a href="https://www.gob.mx/busqueda"><span class="sr-only">Búsqueda</span><i class="icon-search"></i></a></li></ul></div></div></nav></header><div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>

   

  
  

  
  

  
  

  
  


<nav class="grey lighten-5 navbar-fixed" role="navigation">
  <div class="nav-wrapper container">
    <a id="logo-container" href="http://tesi.org.mx/" class="brand-logo"><img src="./TESI __ Sitio __ Oficial_files/descarga.png" style="width:4em;height:100%; margin-bottom:-0.2em" alt=""></a>
    
    <ul class="right hide-on-med-and-down">
      <li><a class="dropdown-button" data-activates="conocenos">Acerca del TESI</a><ul id="conocenos" class="dropdown-content">
    <li><a href="http://tesi.org.mx/dir/404.html">Titular </a></li>
	 <li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/404.html">Antecedentes</a></li>
	 <li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/mision.html">Misión y Visión</a></li>
	 <li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/organigrama.html">Orgranigrama</a></li>
	 <li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/directorio.html">Directorio</a></li>
   <li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/marcoju.html">Marco Jurídico</a></li>
	<li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/Ubicacion.html">Ubicación y Contacto</a></li>
</ul></li>
	  		  <li class="divider"></li>
        <li><a class="dropdown-button" data-activates="oferta">Oferta Educativa</a><ul id="oferta" class="dropdown-content">
    <li><a href="http://tesi.org.mx/dir/carreras.html">Carreras</a></li>
	 <li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/posgrados.html">Posgrados </a></li>
	 <li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/cursos.html">Cursos</a></li>
	 <li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/biblioteca.html">Biblioteca</a></li>
    <li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/convocatoria.html">Convocatorias</a></li>
  </ul></li>
				  <li class="divider"></li>
        <li><a class="dropdown-button" data-activates="alumnos">Alumnos y Egresados</a><ul id="alumnos" class="dropdown-content">
<li><a href="http://tesi.org.mx/dir/reinscripcion.html">Inscripción y Reinscripción</a></li>
<li class="divider"></li>
 <li><a href="http://tesi.org.mx/dir/reinscripcion.html">Becas</a></li>
	<li class="divider"></li>
	<li><a href="http://tesi.org.mx/dir/reg.html">Reglamentos</a></li>
	<li class="divider"></li>
	 <li><a href="http://tesi.org.mx/dir/oferta.html">Bolsa de Trabajo</a></li>
	 <li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/titulacion.html">Titulación</a></li>
	<li class="divider"></li>
	 <li><a href="http://escolar.tesi.org.mx/index.php">Consulta de Calificaciones</a></li>
    <li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/calendario.html">Calendario Escolar</a></li>
	<li class="divider"></li>
    <li><a href="https://www.facebook.com/egresados.tesi">TESI::Comunidad de Egresados</a></li>
	<li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/continua.html">Educación Continua</a></li>
  </ul></li>
				  <li class="divider"></li>
    <li><a class="dropdown-button" data-activates="servicio">Extensión y Vinculación</a><ul id="servicio" class="dropdown-content">
    <li><a href="http://tesi.org.mx/html/pdf/convenios.pdf" target="_blank">Convenios</a></li>
	<li class="divider"></li>
	 <li><a href="http://tesi.org.mx/dir/cic.html">Comunidad de Inglés y Computación (CIC)</a></li>
    <li class="divider"></li>
	 <li><a href="http://tesi.org.mx/dir/documentacion.html">Servicio Social</a></li>
    <li class="divider"></li>
	 <li><a href="http://tesi.org.mx/dir/residencias.html">Residencias Profesionales</a></li>
    <li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/culturales.html">Actividades Culturales</a></li>
	 
  </ul></li>
			  <li class="divider"></li>

      <li><a class="dropdown-button" data-activates="tramites">Trámites y Servicios</a><ul id="tramites" class="dropdown-content">
    <li><a href="http://tesi.org.mx/dir/ventanilla.html">Ventanilla Electronica de Trámites</a></li>
	 <li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/mejora.html">Mejora Regulatoria</a></li>
    <li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/transparencia.html">Transparencia</a></li>
	 <li class="divider"></li>
	<li><a href="http://sgc.tesi.org.mx/index.html">Sistema de Gestión de Calidad</a></li>
	 <li class="divider"></li>
	    <li><a href="http://sga.tesi.org.mx/index.html">Sistema de Gestión Ambiental</a></li>
		 <li class="divider"></li>
		  <li><a href="http://tesi.org.mx/dir/psicologia.html">Unidad de Igualdad de Género</a></li>
		   <li class="divider"></li>
		     <li><a href="http://tesi.org.mx/dir/privacidad.html" target="_blank">Aviso de Privacidad</a></li>
  </ul></li>		 
    </ul>

    <ul id="nav-mobile" class="side-nav" style="transform: translateX(-100%);">
        <li><a class="dropdown-button" data-activates="conocenos-m">Acerca del TESI</a><ul id="conocenos-m" class="dropdown-content">
    <li><a href="http://tesi.org.mx/dir/404.html">Titular </a></li>
	 <li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/404.html">Antecedentes</a></li>
	 <li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/mision.html">Misión y Visión</a></li>
	 <li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/organigrama.html">Orgranigrama</a></li>
	 <li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/directorio.html">Directorio</a></li>
   <li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/marcoju.html">Marco Jurídico</a></li>
	<li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/Ubicacion.html">Ubicación y Contacto</a></li>
  </ul></li>
				  <li class="divider"></li>

        <li><a class="dropdown-button" data-activates="oferta-m">Oferta Educativa</a><ul id="oferta-m" class="dropdown-content">
    <li><a href="http://tesi.org.mx/dir/carreras.html">Carreras</a></li>
	 <li class="divider"></li>
     <li><a href="http://tesi.org.mx/dir/posgrados.html">Posgrados </a></li>
	  <li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/cursos.html">Cursos</a></li>
	 <li class="divider"></li>
   
    <li><a href="http://tesi.org.mx/dir/biblioteca.html">Biblioteca</a></li>
    <li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/convocatoria.html">Convocatorias</a></li>
  </ul></li>
				  <li class="divider"></li>

        <li><a class="dropdown-button" data-activates="alumnos-m">Alumnos y Egresados</a><ul id="alumnos-m" class="dropdown-content">
    <li><a href="http://tesi.org.mx/dir/reinscripcion.html">Inscripción y Reinscripción</a></li>
	<li class="divider"></li>
	 <li><a href="http://tesi.org.mx/dir/reinscripcion.html">Becas</a></li>
	<li class="divider"></li>
	<li><a href="http://tesi.org.mx/dir/reg.html">Reglamentos</a></li>
	<li class="divider"></li>
	 <li><a href="http://tesi.org.mx/dir/oferta.html">Bolsa de Trabajo</a></li>
	 <li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/titulacion.html">Titulación</a></li>
	<li class="divider"></li>
    <li><a href="http://escolar.tesi.org.mx/index.php">Consulta de Calificaciones</a></li>
    <li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/calendario.html">Calendario Escolar</a></li>
	<li class="divider"></li>
    <li><a href="https://www.facebook.com/egresados.tesi">TESI::Comunidad de Egresados</a></li>
	<li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/continua.html">Educación Continua</a></li>
  </ul></li>
				  <li class="divider"></li>

    <li><a class="dropdown-button" data-activates="servicio-m">Extensión y Vinculación</a><ul id="servicio-m" class="dropdown-content">
  
    <li><a href="http://tesi.org.mx/html/pdf/convenios.pdf" target="_blank">Convenios</a></li>
	<li class="divider"></li>
	 <li><a href="http://tesi.org.mx/dir/cic.html">Comunidad de Inglés y Computación (CIC)</a></li>
    <li class="divider"></li>
	 <li><a href="http://tesi.org.mx/dir/documentacion.html">Servicio Social</a></li>
    <li class="divider"></li>
	 <li><a href="http://tesi.org.mx/dir/residencias.html">Residencias Profesionales</a></li>
    <li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/culturales.html">Actividades Culturales</a></li>
	
  </ul></li>
			  <li class="divider"></li>

      <li><a class="dropdown-button" data-activates="tramites-m">Trámites y Servicios</a><ul id="tramites-m" class="dropdown-content">
    <li><a href="http://tesi.org.mx/dir/ventanilla.html">Ventanilla Electronica de Trámites</a></li>
	<li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/mejora.html">Mejora Regulatoria</a></li>
    <li class="divider"></li>
    <li><a href="http://tesi.org.mx/dir/transparencia.html">Transparencia</a></li>
	<li class="divider"></li>
	  <li><a href="http://tesi.org.mx/sgc">Sistema de Gestión de Calidad</a></li>
	  <li class="divider"></li>
	    <li><a href="http://tesi.org.mx/sga">Sistema de Gestión Ambiental</a></li>
		<li class="divider"></li>
		  <li><a href="http://tesi.org.mx/dir/psicologia.html">Unidad de Igualdad de Género</a></li>
		  <li class="divider"></li>
		    <li><a href="http://tesi.org.mx/dir/privacidad.html" target="_blank">Aviso de Privacidad</a></li>
  </ul></li>
    </ul>
      <a href="http://tesi.org.mx/dir/documentacion.html#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>@  </div>
</nav>

<!-- Fin de la barra de navegación + responsive -->
<nav>
    <div class="nav-wrapper grey darken-1">
     <div class="container">
        <div class="col s12">
        <a href="http://tesi.org.mx/index.html" class="breadcrumb">Inicio</a>
        <a href="http://tesi.org.mx/dir/documentacion.html#" class="breadcrumb" disable="">Servicio Social y Residencias</a>
        <a href="http://tesi.org.mx/dir/documentacion.html" class="breadcrumb">Servicio Social y Residencias Profesionales</a>      </div>
     </div>
    </div>
</nav>
<div class="container">
  <center>
    <img style="width:100%; heigth:100%" src="./TESI __ Sitio __ Oficial_files/tec.png" alt="">
  </center>
</div>

  <!--  CONTENIDO -->

  <div style="background-image: url(background1.jpg);    background-position: center;
      background-size: cover;">
    <div style="background-color: rgba(17, 166, 10, 0.30);">
      <div class="container">
        <div class="row" style="margin-bottom: 0;">
          <br><br>
          <h1 class="header center grey-text text-lighten-5">TECNOLOGICO DE ESTUDIOS SUPERIORES DE IXTAPALUCA</h1>
          <div class="row center">
            <h5 class="header col s12 light grey-text text-lighten-5">"Cultura Tecnologica para el Nuevo Milenio" .</h5>
          </div>
          <div class="row center">
            <a href="http://escolar.tesi.org.mx/login.php" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Iniciar Sesión</a>
            <a href="http://escolar.tesi.org.mx/formfolio.html" target="_blank" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Nuevo Ingreso</a>
          </div>
          <br><br>
        </div>
      </div>
    </div>
  </div>
 
   
<h2 class="header center grey-text text-darken-4">CERTIFICADO ACADÉMICO</h2>  
</div>
<div class="container">
            
    <h3 class="faq-title"><strong>¿Qué son los certificados académicos en Blockchain?</strong></h3>
    <p class="description font-light faq-text">
        En esencia, un certificado academico en blockchain es una representación digital de un certificado académico impreso. Técnicamente, 
        creamos un archivo del tipo PNG que contiene información del certificado académico emitido por el Tecnológico, lo
        firmamos, hasheamos, y registramos su hash en la blockchain de Ethereum.
    </p>
    
    
    <br><br>
    <?php 
if(isset($_GET['hashtx'])){
 
      if($network=='m'){
        echo '<h5 class="center">ADDRESS TESI MAIN: <em> 0x9d0616b594d1d189a61194d2b8aa4717555c99e4</em></h5>
              <h5 class="center">SMART CONTRACT TESI MAIN: <em>0xe2ec217dce9fbfbdbd6802b062d1bb2f99480ed2</em></h5>';
      }else{
        echo '<h5 class="center">ADDRESS TESI: <em> 0x9d0616b594d1d189a61194d2b8aa4717555c99e4</em></h5>
              <h5 class="center">SMART CONTRACT TESI: <em>0xe2ec217dce9fbfbdbd6802b062d1bb2f99480ed2</em></h5>';
      }
       

     ?>                
<br><br>
<div class="progress" id="pro">
  <div class="progress-bar progress-bar-info progress-bar-striped inicio anima active" role="progressbar"
  aria-valuenow="40" aria-valuemin="10" aria-valuemax="100" id="pros">
    Verificando huella digital del certificado...
  </div>
</div>
<div id="paa">
  <center>
   <?php 

          if(array_key_exists("error", $result)||$result["result"]==null){
            echo "<div class='alert alert-danger'><strong>La huella digital ingresada no pudo ser autenticada
                    </strong> 
                    <div>".$_GET['hashtx']."</div>
                  </div>";
            echo '<img style="width:100%; heigth:100%" class="img-fluid" src="NotFound.png" alt=""><br><br>';
            echo '<a  class="btn btn-warning btn-sm" href="tel:59-88-05-55">Tel. control escolar:59-88-05-55</a>';
          }else{
            if($result['result']['to']=='0xe2ec217dce9fbfbdbd6802b062d1bb2f99480ed2' &&
             $result['result']['from']=='0x9d0616b594d1d189a61194d2b8aa4717555c99e4'){
    ?>
    
    <div class="alert alert-success">
        <strong>!El certificado académico es autentico!</strong> 
    </div>
    <center>
      <?php 
        if(!isset($_GET['ps'])){
       ?>
      <div class="login d-flex align-items-center">
            <div class="container">
              <div class="row">
                  <div class="col-md-9 col-lg-7 mx-auto">
                    <h3 class="login-heading mb-4">Acceder al Certificado Académico Digital</h3>
                    <br>
                    <form action="TESI __ Sitio __ Oficial.php" method="GET">                
                        <div class="form-label-group">
                          <input type="text" id="ps" name="ps" class="form-control" placeholder="Clave del certificado" required autoComplete="off" style="font-size: 16px;" 
                          />
                        <div class="spac">
                          <input type="hidden" id="hashtx" name="hashtx" class="form-control" placeholder="Clave del certificado" required autoComplete="off" style="font-size: 16px;" value="<?php echo $result["result"]["hash"]; ?>" 
                          />
                          <input type="hidden" name="n" id="oculto" value="r" />
                          <button class="btn btn-primary" type="submit">Mostrar Certificado</button>
                        </div>
                    </form>                
                  </div>
              </div>
            </div>
      </div> 
</center>

<?php
} 
  if(isset($_GET['ps'])){
  if(substr(hash('sha256',substr(hash('sha256',substr($result["result"]["input"],138,-36)),24,-30)),24,-30)==htmlentities($_GET['ps'])){
 ?> 
    <div id="myDiv">
      <img id="p" style="width:100%; heigth:100%" class="img-fluid" src="QRTESI.php" alt="">
    </div>
    
    <?php 
      }else{
        echo "<div class='alert alert-warning'>
                <strong>!La clave del certificado es incorrecta!</strong> 
               </div>";
               echo '<div class="login d-flex align-items-center">
            <div class="container">
              <div class="row">
                  <div class="col-md-9 col-lg-7 mx-auto">
                    <h3 class="login-heading mb-4">Soy el alumno titular del certificado</h3>
                    <br>
                    <form action="TESI __ Sitio __ Oficial.php" method="GET">                
                        <div class="form-label-group">
                          <input type="text" id="ps" name="ps" class="form-control" placeholder="Clave del certificado" required autoComplete="off" style="font-size: 16px;"/>
                        <div class="spac">
                          <input type="hidden" id="hashtx" name="hashtx" class="form-control" placeholder="Clave del certificado" required autoComplete="off" style="font-size: 16px;" value="'.$result["result"]["hash"].'" 
                          />
                          <input type="hidden" name="n" id="oculto" value="r"/>
                          <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Mostrar Certificado</button>
                        </div>
                    </form>
                                          
                  </div>
              </div>
            </div>
      </div>';
      }
    }
     ?>
    <br><br>   
<div class="table-responsive">
  <table class="table">
  <caption><h4>Información de la transacción</h4></caption>
  <thead>
    <tr>
      <th scope="col" data-toggle="tooltip" data-placement="top" title="Es el estado de la transacción">
        <img src="./img/question.png"> Status</i> </th>
          
      <th scope="col">
            <?php echo '<button type="button" class="btn btn-success btn-sm">Success</button>';
           
           ?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" data-toggle="tooltip" data-placement="top" title="Un TxHash o hash de transacción es un identificador único de 66 caracteres que se genera cada vez que se ejecuta una transacción."><img src="./img/question.png"> Transaction hash:</i></th>
      <td><?php echo $result["result"]["hash"]; ?></td>
    </tr>
    <tr>
      <th scope="row" data-toggle="tooltip" data-placement="top" title=" La parte que envía la transacción (podría ser de una dirección de contrato)."><img src="./img/question.png"> From:</i></th>
      <td><?php echo $result["result"]["from"]; ?></a></td>
    </tr>
     <tr>
      <th scope="row" data-toggle="tooltip" data-placement="top" title="La parte receptora de la transacción (podría ser una dirección de contrato)."><img src="./img/question.png"> To:</i></th>
      <td><?php echo $result["result"]["to"]; ?></td>
    </tr>
    <tr>
      <th scope="row" data-toggle="tooltip" data-placement="top" title="El número del bloque en el que se registró la transacción. La confirmación de bloque indica cuántos bloques desde que se extrae la transacción."><img src="./img/question.png"> Block number:</i></th>
      <td><?php echo hexdec(substr($result["result"]["blockNumber"],2)); ?></td>
    </tr>
  </tbody>
</table>
</div> 
<?php 
}else{
  echo '<a  class="btn btn-warning btn-sm" href="tel:59-88-05-55">Tel. control escolar:59-88-05-55</a>';
}
}  
 ?>
</div>
<?php 
}else{
  

 ?>
 <center>
      <div class="login d-flex align-items-center">
            <div class="container">
              <div class="row">
                  <div class="col-md-9 col-lg-7 mx-auto">
                    <h3 class="login-heading mb-4">Buscar certificado académico digital</h3>
                    <br>
                    <form action="TESI __ Sitio __ Oficial.php" method="GET">                
                        <div class="form-label-group">
                          <input type="text" id="hashtx" name="hashtx" class="form-control" placeholder="Blockchain Transaction Hash" required autoComplete="off" style="font-size: 16px;" 
                          />
                        <div class="spac">
                          <input type="hidden" name="n" id="oculto" value="r" />
                          <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Buscar</button>
                        </div>
                    </form>
                                          
                  </div>
              </div>
            </div>
      </div> 
</center>    
<?php 
}
 ?>
 <br>
<div class="container">
  <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/OBZydQOkzTM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>      
  </div>
</div>

<div>

</div>

<br><br>
 
   <!-- Footer -->

  <footer class="page-footer blue-grey lighten-4">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="black-text center">TESI</h5>
          <p style="font-size:1.2em; text-align:justify; border-left:#5CB85C" class="grey-text brown-text text-darken-4 flow-text"> TECNOLÓGICO DE ESTUDIODS SUPERIORES DE IXTAPALUCA.
          </p>
            <div class="center"><b class="center" style="font-size:1.3em; ">"Cultura Tecnológica para el Nuevo Milenio"</b></div>



        </div>
        <div class="col l3 s12">
          <h5 class="black-text">REDES SOCIALES</h5>
          <div class="row">
            <div class="col s3 l6"><a href="https://www.facebook.com/Tec.Ixtapaluca/?fref=ts" target="_blank"><i style="color:#3b5998" class="fa fa-facebook-official fa-5x"></i></a></div>
        
            <div class="col s3 l6"><a href="https://www.youtube.com/channel/UCHohIOeByrw2nW5898K0kUg" target="_blank"><i style="color:#bb0000" class="fa fa-youtube fa-5x"></i></a></div>
          
          </div>
        </div> 

        <div class="col l3 s12"><div class="row">
            <h5 class="black-text">ENLACES EXTERNOS</h5>

            
              <div id="modal2" class="modal bottom-sheet">
                <div class="modal-content">
                  <ul class="collection with-header">
                    <li class="collection-header"><h4>Enlaces</h4></li>
                    <li class="collection-item"><div>IMPRIMIR LINEA DE CAPTURA<a href="https://sfpya.edomexico.gob.mx/recaudacion/index.jsp?opcion=1" target="_blank" class="secondary-content"><i class="fa fa-link fa-2x"></i></a></div></li>
                    <li class="collection-item"><div>IPOMEX<a href="http://www.ipomex.org.mx/ipo/portal/tesi.web" target="_blank" class="secondary-content"><i class="fa fa-link fa-2x"></i></a></div></li>
                    <li class="collection-item"><div>IMPRIME TU CURP<a href="http://dgregistro_civil.edomex.gob.mx/curp" target="_blank" class="secondary-content"><i class="fa fa-link fa-2x"></i></a></div></li>
                    <li class="collection-item"><div>BECAS DE MANUTENCION<a href="http://seduc.edomex.gob.mx/" target="_blank" class="secondary-content"><i class="fa fa-link fa-2x"></i></a></div></li>
                  </ul> 
                </div>
                  <div class="modal-footer">
                    <a href="http://tesi.org.mx/dir/documentacion.html#!" class="modal-action modal-close waves-effect waves-green btn-flat">Regresar</a>
                  </div>
                  
                
              </div>

          <ul>

            <!-- Modal Trigger -->
            <li><a class="waves-effect col s12 l12 waves-light btn  modal-trigger light-green darken-1" href="http://tesi.org.mx/dir/documentacion.html#modal2">Enlaces De Interes</a></li>
            <hr>
            <li><a class=" col s12 l12 waves-effect waves-light btn  modal-trigger red darken-4" href="http://tesi.org.mx/dir/documentacion.html#modal1">Telefonos De Emergencia</a></li>
          </ul>
        </div>

         <!-- Modal Trigger -->

  <!-- Modal Structure -->
  <div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
      <ul class="collection with-header">
        <li class="collection-header"><h4>Telefonos</h4></li>
        <li class="collection-item"><div>Emergencias | <b>066</b><a href="tel:+55 066" class="secondary-content"><i class="fa fa-phone fa-2x"></i></a></div></li>
        <li class="collection-item"><div>Cruz Roja | <b>065</b><a href="tel:+55 065" class="secondary-content"><i class="fa fa-phone fa-2x"></i></a></div></li>
        <li class="collection-item"><div>Denuncia Anónima | <b>089</b><a href="tel:+55 089" class="secondary-content"><i class="fa fa-phone fa-2x"></i></a></div></li>
        <li class="collection-item"><div>Centro de Atención Telefónica Del Gobierno (Lada s/costo) | <b>01800-696-9696</b><a href="tel:+55 01 800 696 9696" class="secondary-content"><i class="fa fa-phone fa-2x"></i></a></div></li>
        <li class="collection-item"><div>Linea sin violencia (CEMyBS) | <b>01800-108-4053</b><a href="tel:+55 01 800 108 4053" class="secondary-content"><i class="fa fa-phone fa-2x"></i></a></div></li>
        <li class="collection-item"><div>Orientacion psicologica(DIFEM) | <b>01800-700-102496</b><a href="tel:01 800 700 102496" class="secondary-content"><i class="fa fa-phone fa-2x"></i></a></div></li>
        <li class="collection-item"><div>Orientacion medica telefonica(ISEM) | <b>01800-249-9000</b><a href="tel:01 800 249 9000" class="secondary-content"><i class="fa fa-phone fa-2x"></i></a></div></li>
        <li class="collection-item"><div>Quejas y sugerencias sobre servicios del Gobieno del Estado de México | <b>01800-720-0202</b><a href="tel:01 800 720 0202" class="secondary-content"><i class="fa fa-phone fa-2x"></i></a></div></li>

      </ul>
      <p></p>
      
    </div>
    <div class="modal-footer">
      <a href="http://tesi.org.mx/dir/documentacion.html#!" class=" modal-action modal-close waves-effect waves-green btn-flat">REGRESAR</a>
    </div>
  </div>
        </div>  

      </div>
    </div>

   
        <!-- Modal Trigger -->
  <center><a class="style1">Km. 7 de la carretera Ixtapaluca-Coatepec s/n San Juan, Distrito de Coatepec, Ixtapaluca, Estado de México C.P.56580, Tel. ( 055 ) 13148150 ext. 129.</a>
  </center>

  <!-- Modal Structure -->
  <div id="modalDes" class="modal">
    <div class="modal-content">
      <h4>Desarrollado por: </h4>
      
        <div class="row">
          <div class="col l6 s12 m6">
            
          <div class="card blue-grey darken-1">
            <div class="card-action">
              <a href="https://www.facebook.com/josze.dzaur"><i class="fa fa-facebook"></i>  Facebook </a>
              <a href="https://plus.google.com/u/0/+JossDzJs"><i class="fa fa-google"></i>  Google</a>
            
        </div>
      </div>
            
          </div>

          <div class="col l6 s12 m6">
            
          <div class="card blue-grey darken-1">
            <div class="card-action">
              <a href="https://www.facebook.com/raptor.rfd42"><i class="fa fa-facebook"></i>  Facebook </a>
              <a href="https://plus.google.com/u/0/117114105855391010532"><i class="fa fa-google"></i>  Google</a>
            
        </div>
      </div>
            
          </div>

          <div class="col l6 s12 m6">
            
          <div class="card blue-grey darken-1">
            <div class="card-action">
              <a href="https://www.facebook.com/LawiHimura"><i class="fa fa-facebook"></i>  Facebook </a>
              <a href="https://plus.google.com/u/0/118059862421428545448"><i class="fa fa-google"></i>  Google</a>
            
        </div>
      </div>
            
          </div>

          <div class="col l6 s12 m6">
            
          <div class="card blue-grey darken-1">
            <div class="card-action">
              <a href="https://www.facebook.com/diegillosk8?__mref=message_bubble"><i class="fa fa-facebook"></i>  Facebook </a>
              <a href="https://www.facebook.com/l.php?u=https%3A%2F%2Fplus.google.com%2Fu%2F0%2F100486301548845464220%2Fposts&amp;h=5AQE22sPZ"><i class="fa fa-google"></i>  Google</a>
            
        </div>
      </div>
            
          </div>

          
      </div>
            
        </div>
  </div>
 
       <a class="brown-text text-darken-4" href="http://materializecss.com/"></a>
  </footer>

<script src="./TESI __ Sitio __ Oficial_files/js"></script>
  <script src="./TESI __ Sitio __ Oficial_files/jquery.min.js.descargar"></script>
  <script src="./TESI __ Sitio __ Oficial_files/materialize.min.js.descargar"></script>
  <script src="./TESI __ Sitio __ Oficial_files/bootstrap.js.descargar"></script>  
  <script src="./TESI __ Sitio __ Oficial_files/init.js.descargar"></script>
  <script>
    $( document ).ready(function(){
    $(".dropdown-button").dropdown({ hover: false });
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
    });
  </script>

  <script src="./TESI __ Sitio __ Oficial_files/gobmx.js.descargar"></script>


<div class="hiddendiv common"></div><div class="drag-target" style="left: 0px; touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div><footer class="main-footer"><div class="list-info"><div class="container"><div class="row"><div class="col-sm-4"><h5>Enlaces</h5><ul><li><a href="http://portaltransparencia.gob.mx/" target="_blank">Portal de Obligaciones de Transparencia</a></li><li><a href="https://www.infomex.org.mx/gobiernofederal/home.action" target="_blank">Sistema Infomex</a></li><li><a href="http://inicio.ifai.org.mx/SitePages/ifai.aspx" target="_blank">INAI</a></li></ul></div><div class="col-sm-4"><h5>¿Qué es gob.mx?</h5><p>Es el portal único de trámites, información y participación ciudadana. <a href="https://www.gob.mx/que-es-gobmx">Leer más</a></p><ul><li><a href="https://www.gob.mx/en/index">English</a></li><li><a href="https://www.gob.mx/temas">Temas</a></li><li><a href="https://www.gob.mx/accesibilidad">Declaración de Accesibilidad</a></li><li><a href="https://www.gob.mx/privacidadintegral">Aviso de privacidad integral</a></li><li><a href="https://www.gob.mx/privacidadsimplificado">Aviso de privacidad simplificado</a></li><li><a href="https://www.gob.mx/terminos">Términos y Condiciones</a></li><li><a href="https://www.gob.mx/terminos#medidas-seguridad-informacion">Política de seguridad</a></li><li><a href="http://www.ordenjuridico.gob.mx/" target="_blank">Marco Jurídico</a></li><li><a href="https://www.gob.mx/sitemap">Mapa de sitio</a></li></ul></div><div class="col-sm-4"><h5>Contacto</h5><p><a href="https://www.gob.mx/tramites/ficha/presentacion-de-quejas-y-denuncias-en-la-sfp/SFP54">Denuncia contra servidores públicos</a></p></div></div><div class="row"><div class="col-sm-4"><form role="form" id="subscribete"><fieldset><legend class="vh">Suscríbete</legend><label for="email">Mantente informado. Suscríbete.</label><div class="form-group-icon"><input type="text" class="form-control" id="email" name="email" aria-label="Ingresa tu correo electrónico" placeholder="usuario@ejemplo.com"><button id="subscribe" type="button" class="blue-right btn"><span class="vh">Suscríbete</span><i class="icon-caret-right"></i></button></div><div class="message-subscribe hidden"></div></fieldset></form></div><div class="col-sm-4 col-sm-offset-4"><h5>Síguenos en</h5><ul class="list-inline"><li><a class="social-icon facebook" target="_blank" href="https://www.facebook.com/gobmexico/" aria-label="Facebook de presidencia"></a></li><li><a class="social-icon twitter" target="_blank" href="https://twitter.com/GobiernoMX" aria-label="Twitter de presidencia"></a></li></ul></div></div></div></div><div class="container"><div class="row"><div class="col-sm-4"><img class="gobmx-footer" src="./TESI __ Sitio __ Oficial_files/gobmxlogo-2.svg" width="126" height="39" alt="Página de inicio, Gobierno de México"></div><div class="col-sm-4 col-sm-offset-4"></div></div></div><img src="./TESI __ Sitio __ Oficial_files/p" height="1" width="1" alt="*" class="vh"><noscript><img src="https://sb.scorecardresearch.com/p?c1=2&c2=17183199&cv=2.0&cj=1" /></noscript></footer></body></html>

