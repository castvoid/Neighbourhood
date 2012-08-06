<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<meta charset="utf-8">
<title>Neighbourhood</title>
<style>
html, body {
	height: 100%;
	margin: 0;
	padding: 0;
	}

#map_canvas {
	height: 100%;
	}
.gmnoprint *{
	color:rgba(0,0,0,0) !important;
	background: transparent !important;
}
@media print {
	html, body {
		height: auto;
		}

	#map_canvas {
    	height: 650px;
    	}	
    }
    </style>
    <script src="//maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>
var map, addP, json;

function showStats(i){
	//Do stuff
}
function initialize() {
    var styles = [{
        stylers: [{
            visibility: "off"
        }]
    }, {
        featureType: "landscape",
        stylers: [{
            visibility: "on"
        }, {
            color: "#ccc"
        }]
    }, {
        featureType: "water",
        stylers: [{
            visibility: "simplified"
        }, {
            color: "#408099"
        }]
    }, {
        featureType: "landscape",
    }]
    
    var styledMap = new google.maps.StyledMapType(styles, {
        name: "Minimal Map"
    });
    var myLatLng = new google.maps.LatLng(51.5, - 0.116);
    var mapOptions = {
        zoom: 5,
        center: myLatLng,
        mapTypeControlOptions: {
            mapTypeIds: []
        },
        maxZoom:10,
        minZoom:5,
        streetViewControl:false
    };

    var map = new google.maps.Map(document.getElementById('map_canvas'),
    mapOptions);


    addP = function (i) {
    if (json[i].path != null){
        json[i].poly = new google.maps.Polygon({
            path: json[i].path,
            strokeColor: "#ff0000",
            fillColor: '#ca8080',
            fillOpacity: '1',
            strokeWeight: 7,
            strokeOpacity: 0.4,
            map: map

        })
        google.maps.event.addListener(json[i].poly, 'click', function() {
	        showStats(i);
        })
        }
    }

    map.mapTypes.set('Minimal Map', styledMap);
    map.setMapTypeId('Minimal Map');
    
json = [{id:"0",name:"Greater London",population:"8174000",density:"5200",gva:"30385",crime:"104",path:[new google.maps.LatLng(51.70660846336452,-.4339599609375),new google.maps.LatLng(51.71086332658573,-.428466796875),new google.maps.LatLng(51.71681946274873,-.3790283203125),new google.maps.LatLng(51.707459468026094,-.330963134765625),new google.maps.LatLng(51.717670275312415,-.273284912109375),new google.maps.LatLng(51.685328143638216,-.2252197265625),new google.maps.LatLng(51.68362528576683,-.177154541015625),new google.maps.LatLng(51.68788231035757,-.157928466796875),new google.maps.LatLng(51.691287641824474,-.10986328125),new google.maps.LatLng(51.68277383281327,-.061798095703125),new google.maps.LatLng(51.678516327862134,.009613037109375),new google.maps.LatLng(51.678516327862134,.031585693359375),new google.maps.LatLng(51.68788231035757,.0823974609375),new google.maps.LatLng(51.68958500811337,.098876953125),new google.maps.LatLng(51.64699834847127,.207366943359375),new google.maps.LatLng(51.60181277107468,.270538330078125),new google.maps.LatLng(51.558289817660665,.2911376953125),new google.maps.LatLng(51.42490192575532,.237579345703125),new google.maps.LatLng(51.36320660581431,.15380859375),new google.maps.LatLng(51.30657945585936,.1593017578125),new google.maps.LatLng(51.267929925864756,.01373291015625),new google.maps.LatLng(51.26535213392538,-.14556884765625),new google.maps.LatLng(51.25589899305907,-.2252197265625),new google.maps.LatLng(51.269648373496736,-.25543212890625),new google.maps.LatLng(51.2928411273273,-.2911376953125),new google.maps.LatLng(51.30743796487254,-.41473388671875),new google.maps.LatLng(51.33833359386697,-.487518310546875),new google.maps.LatLng(51.415481636209535,-.542449951171875),new google.maps.LatLng(51.534377136326285,-.50537109375),new google.maps.LatLng(51.56768064709022,-.536956787109375),new google.maps.LatLng(51.61545844207285,-.52734375),new google.maps.LatLng(51.66914840783795,-.490264892578125)]},{id:"1",name:"North East England",population:"2597000",density:"302",gva:"15688",crime:"59",path:[new google.maps.LatLng(55.78892895389265,-2.04345703125),new google.maps.LatLng(55.61558902526751,-1.790771484375),new google.maps.LatLng(55.50374985927514,-1.58203125),new google.maps.LatLng(55.166318941250886,-1.58203125),new google.maps.LatLng(54.882927024213885,-1.373291015625),new google.maps.LatLng(54.572061655658544,-.94482421875),new google.maps.LatLng(54.54020652089137,-.6591796875),new google.maps.LatLng(54.48918653875086,-1.417236328125),new google.maps.LatLng(54.46365264504479,-1.988525390625),new google.maps.LatLng(54.42532191246645,-2.340087890625),new google.maps.LatLng(54.75633118164471,-2.79052734375),new google.maps.LatLng(55.03431871502809,-3.021240234375)]},{id:"2",name:"North West England",population:"7052000",density:"498",gva:"17433",crime:"70",path:[new google.maps.LatLng(55.02802211299252,-3.087158203125),new google.maps.LatLng(54.76267040025495,-2.823486328125),new google.maps.LatLng(54.49556752187406,-2.603759765625),new google.maps.LatLng(54.406143090319674,-2.296142578125),new google.maps.LatLng(54.12382170046237,-2.537841796875),new google.maps.LatLng(54.04003822492974,-2.493896484375),new google.maps.LatLng(53.9560855309879,-2.2412109375),new google.maps.LatLng(53.8460456413833,-2.08740234375),new google.maps.LatLng(53.657661020298,-2.08740234375),new google.maps.LatLng(53.48804553605622,-1.856689453125),new google.maps.LatLng(53.50111704294316,-1.988525390625),new google.maps.LatLng(53.30462107510271,-2.0654296875),new google.maps.LatLng(53.225768435790194,-1.99951171875),new google.maps.LatLng(52.9751081817353,-2.493896484375),new google.maps.LatLng(52.94201777829491,-2.8125),new google.maps.LatLng(53.07422751310222,-2.8564453125),new google.maps.LatLng(53.28492154619621,-3.109130859375),new google.maps.LatLng(53.48804553605622,-3.1201171875),new google.maps.LatLng(53.92375094101389,-3.05419921875),new google.maps.LatLng(53.969012350740314,-2.889404296875),new google.maps.LatLng(54.02713344412541,-2.889404296875),new google.maps.LatLng(54.10450206317112,-2.7685546875),new google.maps.LatLng(54.194583360162646,-2.867431640625),new google.maps.LatLng(54.16243396806779,-2.9443359375),new google.maps.LatLng(54.20101023973888,-3.076171875),new google.maps.LatLng(54.04003822492974,-3.197021484375),new google.maps.LatLng(54.09161730232633,-3.284912109375),new google.maps.LatLng(54.271639968447985,-3.18603515625),new google.maps.LatLng(54.213861000644926,-3.306884765625),new google.maps.LatLng(54.41253702796794,-3.504638671875),new google.maps.LatLng(54.508326500290735,-3.603515625),new google.maps.LatLng(54.77534585936447,-3.482666015625),new google.maps.LatLng(54.93345430690937,-3.482666015625),new google.maps.LatLng(55.034318715028064,-3.065185546875)]},{id:"3",name:"Yorkshire and the Humber",population:"5284000",density:"343",gva:"16880",crime:"74",path:[new google.maps.LatLng(53.41,-1.11),new google.maps.LatLng(53.3,-1.26),new google.maps.LatLng(53.34,-1.43),new google.maps.LatLng(53.32,-1.62),new google.maps.LatLng(53.45,-1.75),new google.maps.LatLng(53.55,-1.9),new google.maps.LatLng(53.65,-2.05),new google.maps.LatLng(53.84,-2.05),new google.maps.LatLng(53.96,-2.19),new google.maps.LatLng(54.02,-2.36),new google.maps.LatLng(54.1,-2.53),new google.maps.LatLng(54.23,-2.4),new google.maps.LatLng(54.38,-2.29),new google.maps.LatLng(54.46,-2.13),new google.maps.LatLng(54.45,-1.95),new google.maps.LatLng(54.52,-1.78),new google.maps.LatLng(54.51,-1.59),new google.maps.LatLng(54.48,-1.42),new google.maps.LatLng(54.51,-1.24),new google.maps.LatLng(54.5,-1.05),new google.maps.LatLng(54.48,-.87),new google.maps.LatLng(54.52,-.69),new google.maps.LatLng(54.45,-.52),new google.maps.LatLng(54.31,-.41),new google.maps.LatLng(54.18,-.27),new google.maps.LatLng(54.13,-.09),new google.maps.LatLng(53.98,-.2),new google.maps.LatLng(53.84,-.09),new google.maps.LatLng(53.72,.05),new google.maps.LatLng(53.55,-.01),new google.maps.LatLng(53.47,-.17),new google.maps.LatLng(53.61,-.29),new google.maps.LatLng(53.56,-.46),new google.maps.LatLng(53.46,-.61),new google.maps.LatLng(53.46,-.79),new google.maps.LatLng(53.47,-.98),new google.maps.LatLng(53.41,-1.11)]},{id:"4",name:"East Midlands",population:"4533000",density:"290",gva:"17698",crime:"67",path:[new google.maps.LatLng(52.64,-.5),new google.maps.LatLng(52.52,-.38),new google.maps.LatLng(52.38,-.46),new google.maps.LatLng(52.25,-.56),new google.maps.LatLng(52.19,-.71),new google.maps.LatLng(52.13,-.87),new google.maps.LatLng(52.08,-1.02),new google.maps.LatLng(51.99,-1.16),new google.maps.LatLng(52.04,-1.31),new google.maps.LatLng(52.2,-1.26),new google.maps.LatLng(52.35,-1.21),new google.maps.LatLng(52.5,-1.3),new google.maps.LatLng(52.55,-1.46),new google.maps.LatLng(52.67,-1.57),new google.maps.LatLng(52.83,-1.58),new google.maps.LatLng(52.87,-1.74),new google.maps.LatLng(53.03,-1.76),new google.maps.LatLng(53.17,-1.83),new google.maps.LatLng(53.21,-1.99),new google.maps.LatLng(53.37,-2.03),new google.maps.LatLng(53.5,-1.94),new google.maps.LatLng(53.47,-1.78),new google.maps.LatLng(53.37,-1.65),new google.maps.LatLng(53.32,-1.49),new google.maps.LatLng(53.32,-1.33),new google.maps.LatLng(53.33,-1.17),new google.maps.LatLng(53.43,-1.04),new google.maps.LatLng(53.46,-.88),new google.maps.LatLng(53.52,-.73),new google.maps.LatLng(53.46,-.57),new google.maps.LatLng(53.52,-.42),new google.maps.LatLng(53.61,-.28),new google.maps.LatLng(53.48,-.19),new google.maps.LatLng(53.52,-.03),new google.maps.LatLng(53.5,.13),new google.maps.LatLng(53.38,.24),new google.maps.LatLng(53.25,.33),new google.maps.LatLng(53.09,.33),new google.maps.LatLng(53.03,.18),new google.maps.LatLng(52.92,.06),new google.maps.LatLng(52.84,.2),new google.maps.LatLng(52.72,.08),new google.maps.LatLng(52.67,-.07),new google.maps.LatLng(52.66,-.23),new google.maps.LatLng(52.65,-.39),new google.maps.LatLng(52.64,-.5)]},{id:"5",name:"West Midlands",population:"5602000",density:"431",gva:"17161",crime:"66",path:[new google.maps.LatLng(52.69,-1.59),new google.maps.LatLng(52.57,-1.51),new google.maps.LatLng(52.52,-1.38),new google.maps.LatLng(52.45,-1.26),new google.maps.LatLng(52.32,-1.24),new google.maps.LatLng(52.19,-1.3),new google.maps.LatLng(52.1,-1.4),new google.maps.LatLng(52.02,-1.51),new google.maps.LatLng(51.98,-1.65),new google.maps.LatLng(52.09,-1.73),new google.maps.LatLng(52.07,-1.87),new google.maps.LatLng(52.03,-2.01),new google.maps.LatLng(52,-2.14),new google.maps.LatLng(51.98,-2.28),new google.maps.LatLng(52,-2.42),new google.maps.LatLng(51.89,-2.5),new google.maps.LatLng(51.84,-2.64),new google.maps.LatLng(51.86,-2.77),new google.maps.LatLng(51.92,-2.9),new google.maps.LatLng(51.96,-3.03),new google.maps.LatLng(52.07,-3.12),new google.maps.LatLng(52.21,-3.1),new google.maps.LatLng(52.26,-2.97),new google.maps.LatLng(52.36,-3.07),new google.maps.LatLng(52.42,-3.2),new google.maps.LatLng(52.5,-3.08),new google.maps.LatLng(52.64,-3.07),new google.maps.LatLng(52.73,-2.97),new google.maps.LatLng(52.79,-3.09),new google.maps.LatLng(52.93,-3.05),new google.maps.LatLng(52.94,-2.91),new google.maps.LatLng(52.91,-2.78),new google.maps.LatLng(52.99,-2.66),new google.maps.LatLng(52.95,-2.53),new google.maps.LatLng(52.99,-2.39),new google.maps.LatLng(53.08,-2.28),new google.maps.LatLng(53.16,-2.17),new google.maps.LatLng(53.19,-2.04),new google.maps.LatLng(53.2,-1.9),new google.maps.LatLng(53.11,-1.79),new google.maps.LatLng(52.98,-1.83),new google.maps.LatLng(52.87,-1.75),new google.maps.LatLng(52.84,-1.61),new google.maps.LatLng(52.74,-1.7),new google.maps.LatLng(52.69,-1.59)]},{id:"6",name:"East of England",population:"5847000",density:"306",gva:"20524",crime:"59",path:[new google.maps.LatLng(52.96187505907605,.4833984375),new google.maps.LatLng(52.822682558069324,.24169921875),new google.maps.LatLng(52.66305767075937,-.02197265625),new google.maps.LatLng(52.669720383688194,-.318603515625),new google.maps.LatLng(52.16045455774708,-.50537109375),new google.maps.LatLng(51.83577752045251,-1.142578125),new google.maps.LatLng(51.73383267274116,-1.043701171875),new google.maps.LatLng(51.49506473014373,-.94482421875),new google.maps.LatLng(51.39920565355381,-.63720703125),new google.maps.LatLng(51.385495069223225,-.538330078125),new google.maps.LatLng(51.69979984974196,-.263671875),new google.maps.LatLng(51.66574141105715,.010986328125),new google.maps.LatLng(51.66574141105715,.17578125),new google.maps.LatLng(51.5634123286759,.263671875),new google.maps.LatLng(51.46085244645552,.263671875),new google.maps.LatLng(51.31001339554937,.142822265625),new google.maps.LatLng(51.50190410761816,.428466796875),new google.maps.LatLng(51.55658218576256,.911865234375),new google.maps.LatLng(51.81540697949439,1.219482421875),new google.maps.LatLng(51.93749209045437,1.29638671875),new google.maps.LatLng(52.099756925757276,1.636962890625),new google.maps.LatLng(52.70967533219885,1.724853515625),new google.maps.LatLng(52.981723223906855,.911865234375)]},{id:"7",name:"South East England",population:"8635000",density:"452",gva:"22624",crime:"63",path:[new google.maps.LatLng(51.48822432632349,.46142578125),new google.maps.LatLng(51.303145259199084,.230712890625),new google.maps.LatLng(51.23440735163461,-.186767578125),new google.maps.LatLng(51.37178037591742,-.560302734375),new google.maps.LatLng(51.55658218576256,-.999755859375),new google.maps.LatLng(51.795027225829166,-1.16455078125),new google.maps.LatLng(52.07275365395322,-.72509765625),new google.maps.LatLng(52.10650519075635,-.87890625),new google.maps.LatLng(51.984880139916655,-1.219482421875),new google.maps.LatLng(52.13348804077152,-1.307373046875),new google.maps.LatLng(51.984880139916655,-1.56005859375),new google.maps.LatLng(51.76104049272955,-1.658935546875),new google.maps.LatLng(51.590722643120166,-1.571044921875),new google.maps.LatLng(51.43346414054374,-1.51611328125),new google.maps.LatLng(51.048301133312265,-1.6259765625),new google.maps.LatLng(50.9791824266019,-1.812744140625),new google.maps.LatLng(50.80593472676911,-1.77978515625),new google.maps.LatLng(50.76425935711649,-1.77978515625),new google.maps.LatLng(50.77120783188785,-1.3623046875),new google.maps.LatLng(50.77120783188785,-.977783203125),new google.maps.LatLng(50.85450904781298,-.230712890625),new google.maps.LatLng(50.6947178381929,.296630859375),new google.maps.LatLng(50.92381327191295,.823974609375),new google.maps.LatLng(50.89610395554361,.955810546875),new google.maps.LatLng(51.08282186160981,1.16455078125),new google.maps.LatLng(51.158676864423676,1.40625),new google.maps.LatLng(51.351200630656,1.417236328125)]},{id:"8",name:"South West England",population:"5289000",density:"222",gva:"18195",crime:"61",path:[new google.maps.LatLng(52.11,-1.77),new google.maps.LatLng(51.94,-1.62),new google.maps.LatLng(51.73,-1.69),new google.maps.LatLng(51.52,-1.59),new google.maps.LatLng(51.3,-1.53),new google.maps.LatLng(51.09,-1.64),new google.maps.LatLng(51.01,-1.85),new google.maps.LatLng(50.79,-1.8),new google.maps.LatLng(50.62,-1.96),new google.maps.LatLng(50.62,-2.19),new google.maps.LatLng(50.63,-2.41),new google.maps.LatLng(50.67,-2.64),new google.maps.LatLng(50.73,-2.86),new google.maps.LatLng(50.7,-3.09),new google.maps.LatLng(50.63,-3.3),new google.maps.LatLng(50.52,-3.51),new google.maps.LatLng(50.32,-3.6),new google.maps.LatLng(50.21,-3.81),new google.maps.LatLng(50.3,-4.02),new google.maps.LatLng(50.34,-4.24),new google.maps.LatLng(50.34,-4.47),new google.maps.LatLng(50.35,-4.69),new google.maps.LatLng(50.22,-4.88),new google.maps.LatLng(50.13,-5.09),new google.maps.LatLng(50.08,-5.31),new google.maps.LatLng(50.11,-5.54),new google.maps.LatLng(50.24,-5.35),new google.maps.LatLng(50.35,-5.15),new google.maps.LatLng(50.54,-5.02),new google.maps.LatLng(50.6,-4.8),new google.maps.LatLng(50.75,-4.63),new google.maps.LatLng(50.96,-4.54),new google.maps.LatLng(50.99,-4.32),new google.maps.LatLng(51.19,-4.21),new google.maps.LatLng(51.22,-3.98),new google.maps.LatLng(51.24,-3.75),new google.maps.LatLng(51.23,-3.53),new google.maps.LatLng(51.18,-3.3),new google.maps.LatLng(51.2,-3.08),new google.maps.LatLng(51.39,-2.96),new google.maps.LatLng(51.49,-2.75),new google.maps.LatLng(51.7,-2.67),new google.maps.LatLng(51.88,-2.52),new google.maps.LatLng(52.02,-2.34),new google.maps.LatLng(52.01,-2.12),new google.maps.LatLng(52.03,-1.89),new google.maps.LatLng(52.11,-1.77)]},{id:"9",name:"Wales",population:"3064000",density:"148",gva:"19530",crime:"63",path:[new google.maps.LatLng(51.62,-3.88),new google.maps.LatLng(51.56,-4.05),new google.maps.LatLng(51.54,-4.24),new google.maps.LatLng(51.66,-4.09),new google.maps.LatLng(51.68,-4.28),new google.maps.LatLng(51.77,-4.45),new google.maps.LatLng(51.73,-4.63),new google.maps.LatLng(51.64,-4.79),new google.maps.LatLng(51.61,-4.98),new google.maps.LatLng(51.72,-5.13),new google.maps.LatLng(51.87,-5.23),new google.maps.LatLng(51.99,-5.08),new google.maps.LatLng(52.03,-4.9),new google.maps.LatLng(52.11,-4.73),new google.maps.LatLng(52.14,-4.55),new google.maps.LatLng(52.21,-4.38),new google.maps.LatLng(52.27,-4.2),new google.maps.LatLng(52.42,-4.09),new google.maps.LatLng(52.6,-4.12),new google.maps.LatLng(52.79,-4.13),new google.maps.LatLng(52.94,-4.02),new google.maps.LatLng(52.91,-4.21),new google.maps.LatLng(52.89,-4.39),new google.maps.LatLng(52.81,-4.56),new google.maps.LatLng(52.78,-4.74),new google.maps.LatLng(52.92,-4.62),new google.maps.LatLng(52.99,-4.45),new google.maps.LatLng(53.12,-4.32),new google.maps.LatLng(53.22,-4.16),new google.maps.LatLng(53.26,-3.98),new google.maps.LatLng(53.32,-3.8),new google.maps.LatLng(53.29,-3.62),new google.maps.LatLng(53.34,-3.43),new google.maps.LatLng(53.31,-3.25),new google.maps.LatLng(53.23,-3.08),new google.maps.LatLng(53.12,-2.93),new google.maps.LatLng(52.99,-2.8),new google.maps.LatLng(52.96,-2.98),new google.maps.LatLng(52.88,-3.15),new google.maps.LatLng(52.76,-3.01),new google.maps.LatLng(52.6,-3.1),new google.maps.LatLng(52.46,-3.22),new google.maps.LatLng(52.35,-3.07),new google.maps.LatLng(52.17,-3.11),new google.maps.LatLng(51.99,-3.07),new google.maps.LatLng(51.92,-2.9),new google.maps.LatLng(51.84,-2.73),new google.maps.LatLng(51.67,-2.66),new google.maps.LatLng(51.56,-2.81),new google.maps.LatLng(51.54,-2.99),new google.maps.LatLng(51.45,-3.16),new google.maps.LatLng(51.39,-3.33),new google.maps.LatLng(51.4,-3.52),new google.maps.LatLng(51.48,-3.69),new google.maps.LatLng(51.6,-3.83),new google.maps.LatLng(51.62,-3.88)]},{id:"10",name:"Northern Ireland",population:"1810900",density:"131",gva:"19603",crime:"55",path:[new google.maps.LatLng(55.2,-6.67),new google.maps.LatLng(55.25,-6.49),new google.maps.LatLng(55.23,-6.31),new google.maps.LatLng(55.22,-6.13),new google.maps.LatLng(55.05,-6.04),new google.maps.LatLng(54.93,-5.89),new google.maps.LatLng(54.85,-5.73),new google.maps.LatLng(54.7,-5.84),new google.maps.LatLng(54.67,-5.66),new google.maps.LatLng(54.58,-5.5),new google.maps.LatLng(54.4,-5.46),new google.maps.LatLng(54.54,-5.58),new google.maps.LatLng(54.37,-5.67),new google.maps.LatLng(54.24,-5.8),new google.maps.LatLng(54.09,-5.91),new google.maps.LatLng(54.03,-6.08),new google.maps.LatLng(54.1,-6.26),new google.maps.LatLng(54.06,-6.44),new google.maps.LatLng(54.04,-6.62),new google.maps.LatLng(54.19,-6.73),new google.maps.LatLng(54.32,-6.86),new google.maps.LatLng(54.42,-7.03),new google.maps.LatLng(54.31,-7.18),new google.maps.LatLng(54.14,-7.26),new google.maps.LatLng(54.15,-7.45),new google.maps.LatLng(54.17,-7.64),new google.maps.LatLng(54.21,-7.85),new google.maps.LatLng(54.34,-7.98),new google.maps.LatLng(54.44,-8.16),new google.maps.LatLng(54.54,-8),new google.maps.LatLng(54.56,-7.82),new google.maps.LatLng(54.72,-7.72),new google.maps.LatLng(54.79,-7.54),new google.maps.LatLng(54.94,-7.43),new google.maps.LatLng(55.05,-7.28),new google.maps.LatLng(55.04,-7.09),new google.maps.LatLng(55.17,-6.96),new google.maps.LatLng(55.17,-6.77),new google.maps.LatLng(55.2,-6.67)]},{id:"11",name:"Scotland",population:"5062011",density:"65",gva:"26766",crime:"82",path:[new google.maps.LatLng(55.95,-3.08),new google.maps.LatLng(56,-2.55),new google.maps.LatLng(55.83,-2.05),new google.maps.LatLng(55.38,-2.34),new google.maps.LatLng(55.14,-2.81),new google.maps.LatLng(54.98,-3.32),new google.maps.LatLng(54.86,-3.84),new google.maps.LatLng(54.87,-4.37),new google.maps.LatLng(54.84,-4.9),new google.maps.LatLng(55.36,-4.77),new google.maps.LatLng(55.87,-4.89),new google.maps.LatLng(56,-5.4),new google.maps.LatLng(55.49,-5.52),new google.maps.LatLng(56.01,-5.6),new google.maps.LatLng(56.51,-5.42),new google.maps.LatLng(56.58,-5.94),new google.maps.LatLng(56.98,-5.6),new google.maps.LatLng(57.45,-5.86),new google.maps.LatLng(57.92,-5.62),new google.maps.LatLng(57.85,-5.1),new google.maps.LatLng(58.37,-5.17),new google.maps.LatLng(58.55,-4.67),new google.maps.LatLng(58.56,-4.14),new google.maps.LatLng(58.62,-3.61),new google.maps.LatLng(58.65,-3.08),new google.maps.LatLng(58.24,-3.43),new google.maps.LatLng(57.99,-3.89),new google.maps.LatLng(57.65,-4.31),new google.maps.LatLng(57.62,-3.78),new google.maps.LatLng(57.71,-3.25),new google.maps.LatLng(57.69,-2.72),new google.maps.LatLng(57.67,-2.18),new google.maps.LatLng(57.15,-2.08),new google.maps.LatLng(56.76,-2.43),new google.maps.LatLng(56.46,-2.87),new google.maps.LatLng(56.06,-3.22),new google.maps.LatLng(56.08,-3.75),new google.maps.LatLng(55.99,-3.23),new google.maps.LatLng(55.95,-3.08)]}]
}
function run(){
	for(i=0;i<12;i++){
		addP(i);
	}
	
}
    </script>
  </head>
  <body onload="initialize();run()">
    <div id="map_canvas"></div>
  </body>
</html>
