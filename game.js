var map, addP, json, selected = -1,
    player = {
        money: 0,
        name: 'Player',
        armies: 0,
        happinessAvg: 0,
        regions: 0,
        controlOf: [false, false, false, false, false, false, false, false, false, false, false, false]
    },
    eraseGame = function () {
        if (confirm('Are you sure?')) {
            localStorage.removeItem('saveGame');
            localStorage.removeItem('newGame');
            window.location = 'index';
        }
    },
    build = function (event) {
    	event.preventDefault();
        e = $(this).data('e');
        b = $(this).data('b');
        
        if (json[selected][b] > buildings[b].amount && e == -1 &&  buildings[b].cost / 4 <= player.money || buildings[b].cost <= player.money && e == 1) {
			json[selected][b] += e * buildings[b].amount;
			if (b == "armies") {
				player.armies += e * buildings[b].amount;
			}
			e == 1 ? player.money -= buildings[b].cost : player.money -= buildings[b].cost / 4
			$('#currentmoney').text(player.money);
			$('#modal .modal-body').html('<p>What would you like to build/destroy in ' + json[selected].name + '? There are:</p><table><tr class="bb"><td><a href="#" data-e="1" data-b="schools" class="btn btn-mini btn-success">Build school</a></td> <td><strong>' + json[selected].schools + '</strong> Schools</td><td><a href="#" class="btn btn-mini btn-danger" data-e="-1" data-b="schools">Destroy school</a></td></tr><tr class="bb"><td><a href="#" data-e="1" data-b="hospitals" class="btn btn-mini btn-success">Build hospital</a></td><td><strong>' + json[selected].hospitals + '</strong> Hospitals</td><td><a href="#" class="btn btn-mini btn-danger" data-e="-1" data-b="hospitals">Destroy hospital</a></td></tr><tr class="bb"><td><a href="#" data-e="1" data-b="armies" class="btn btn-mini btn-success">Build army</a></td><td><strong>' + json[selected].armies + '</strong> Armies</td><td><a href="#" class="btn btn-mini btn-danger" data-e="-1" data-b="armies">Destroy army</a></td></tr></table>');
			$('#modal .btn-success,#modal .btn-danger').click(build);   
			json[selected].happiness = happiness(selected);
			json[selected].oppression = oppression(selected);
			showStats(selected);
			save();
			update();
        }
    },
showStats = function (i) {
    if (i > -1) {
        selected = i
        var sidebar = '<h1>' + json[i].name + '</h1><h2>Stats</h2><ul><li><label>Population: </label>' + json[i].population + '<li><label>Population Density: </label>' + json[i].density + '<li><label>Money: </label>&pound;' + json[i].gva + '<li><label>Crime: ' + json[i].crime + '<li><label>Armies: </label>' + json[i].armies + '</li><li><label>Schools: </label>' + json[i].schools + '<li><label>Hospitals: </labels>' + json[i].hospitals + '</ul><ul id="bars"><li class="tip" title="Happiness of this region"><i class="icon-minus icon-large"></i><span id="happiness" class="bar"><span style="width: ' + json[i].happiness + '%;"></span></span><i class="icon-plus icon-large"></i></li><li class="tip" title="Oppression of this region"><i class="icon-bolt icon-large"></i><span id="oppression" class="bar"><span style="width: ' + json[i].oppression + '%;"></span></span><i class="icon-bolt icon-large"></i></li></ul>';
        
        if (player.controlOf[selected] == true) {
            sidebar = sidebar + '<a class="sideB btn tip" title="Build something in this region" href="javascript:modal();">Build</a>';
        } else {
			sidebar = sidebar + '<a class="sideB btn tip" title="Take over this region" href="javascript:invadeModal();">Invade</a>';
		}
        $('.stats').html(sidebar);
        $('.tip').tooltip({
            'placement': 'top'
        });
    } else {
        selected = -1;
        $('.stats').html('<h1>No selection</h1>');
    }
},
modal = function () {
    $('#modal h3').html(json[selected].name);
    $('#modal .modal-body').html('<p>What would you like to build/destroy in ' + json[selected].name + '? There are:</p><table><tr class="bb"><td><a href="#" data-e="1" data-b="schools" class="btn btn-mini btn-success">Build school</a></td> <td><strong>' + json[selected].schools + '</strong> Schools</td><td><a href="#" class="btn btn-mini btn-danger" data-e="-1" data-b="schools">Destroy school</a></td></tr><tr class="bb"><td><a href="#" data-e="1" data-b="hospitals" class="btn btn-mini btn-success">Build hospital</a></td><td><strong>' + json[selected].hospitals + '</strong> Hospitals</td><td><a href="#" class="btn btn-mini btn-danger" data-e="-1" data-b="hospitals">Destroy hospital</a></td></tr><tr class="bb"><td><a href="#" data-e="1" data-b="armies" class="btn btn-mini btn-success">Build army</a></td><td><strong>' + json[selected].armies + '</strong> Armies</td><td><a href="#" class="btn btn-mini btn-danger" data-e="-1" data-b="armies">Destroy army</a></td></tr></table>');
    $('#modal').modal('show');
    $('#modal .btn-success,#modal .btn-danger').click(build);
},
happiness = function(j) { // J is the ID of the place in the JSON db
    h = 50;
    var plc = json[j];
    if(plc.density > 150) {
        h -= Math.sqrt(plc.density - 150);
    }
    if(plc.density < 100) {
        h -= (100 - plc.density) / 4;
    }
    h -= plc.crime / 6;
    h += plc.schools / plc.population * 50000 + plc.hospitals / plc.population * 500000;
    h += Math.pow(plc.gva, 8) * 0.00000000000000000000000000000000006;
    if(h > 100) {
        h = 100;
    }
    if(h < 0) {
        h = 0;
    }
    return Math.round(h);
},
oppression = function(j) {
    o = 50;
    var plc = json[j];
    o += (Math.sqrt(plc.density)) / 3.5;
    o -= plc.schools / plc.population * 2000 + plc.hospitals / plc.population * 1500000;
    if(o > 100) {
        o = 100;
    }
    if(o < 0) {
        o = 0;
    }
    return o;
},
update = function () {
    player.regions = 0;
    for (i = 0; i < player.controlOf.length; i++) {
        if (player.controlOf[i] == true) {
            json[i].poly.setOptions({
                fillColor: "#2f2"
            });
            player.regions++;
        }
    }
    $('#currentregions').text(player.regions);
    $('#currentmoney').text(player.money);
    $('#totalarmies').text(player.armies);
},
save = function () {
    j = {
        player: player,
        json: json
    }
    localStorage.setItem('saveGame', JSON.stringify(j, function (k, v) {
        if (k == "poly") return undefined;
        else return v;
    }));
}

function invadeRegion(toInvade) {
	var myPower = player.armies / player.regions; // ((player.happinessAvg / 220) + 1) *
	var theirPower = json[selected].armies; // ((json[selected].happiness / 220) + 1) *
	var diffInPower = Math.abs(myPower - theirPower);
	var menLost = Math.round(player.armies / diffInPower);
	if (theirPower > myPower) {
		alert('Invasion unsuccessful!');
		menLost *= 2;
	} else {
		//player.armies += json[selected].armies;
		player.controlOf[selected] = true;
		player.money += Math.round(json[selected].gva * (1+((json[selected].happiness / 500) + (json[selected].oppression / 250))));
	}
	player.armies -= menLost + Math.floor(Math.random()*5);
	update();
	save();
}

function invadeModal() {
	var result;
	var myPower = player.armies / player.regions; // ((player.happinessAvg / 220) + 1) *
	var theirPower = json[selected].armies; // ((json[selected].happiness / 220) + 1) *
	if (myPower < theirPower) {
		result = "unsuccessful";
	} else {
		result = "successful";
	}
    $('#invadeModal h3').html(json[selected].name);
    $('#invadeModal .modal-body').html('You have <strong>' + player.armies + '</strong> armies. ' + json[selected].name + ' has <strong>' + json[selected].armies + '</strong> armies. Based on the happiness of your areas, this means that your takeover is likely to be <strong>' + result + '</strong>. Would you like to invade?');
    $('#invadeModal .modal-footer').html('<a href="#" class="btn" data-dismiss="modal">Cancel</a> <a href="#" onclick="invadeRegion(' + selected + ');" class="btn btn-primary" data-dismiss="modal">Invade</a>');
    $('#invadeModal').modal('show');
    $('#invadeModal .btn-success,#modal .btn-danger').click();
}

function initialize() {
    if (typeof localStorage.getItem('newGame') == 'string') {
        j = JSON.parse(localStorage.getItem('newGame'));
        player.name = j.name;
        player.controlOf[j.region] = true;
        localStorage.removeItem('newGame');
        json = defaultJSON;
        player.money += json[j.region].gva
        for (x = 0; x < 12; x++) {
            json[x].armies = Math.floor(Math.random() * json[x].crime + 5) + json[x].crime - 20;
        }
        player.armies += json[j.region].armies;
        save()
    } else {
        j = JSON.parse(localStorage.getItem('saveGame'));
        json = j.json;
        player = j.player;
    }
    
	for (i=0;i<12;i++) {
		if (player.controlOf[i] == true) {
			
			player.happinessAvg += json[i].happiness;
			player.regions++;
		}
	}
	player.happinessAvg /= player.regions;
	
    $('#playername').text(player.name);
    $('#totalarmies').text(player.armies);
    $('.tip').tooltip({
        'placement': 'right'
    });
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
        featureType: "landscape"
    }]
    var styledMap = new google.maps.StyledMapType(styles, {
        name: "Minimal Map"
    })
    var myLatLng = new google.maps.LatLng(56.46, - 7.015);

    function makePath(c) {
        newA = []
        for (i = 0; i < c.length; i++) {
            newA.push(new google.maps.LatLng(c[i][0], c[i][1]))
        }
        return newA
    }
    var mapOptions = {
        zoom: 5,
        center: myLatLng,
        mapTypeControlOptions: {
            mapTypeIds: []
        },
        maxZoom: 8,
        minZoom: 5,
        panControl: false,
        streetViewControl: false,
        zoomControl: true,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.SMALL,
            position: google.maps.ControlPosition.TOP_RIGHT
        }
    }
    map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions)
    addP = function (i) {
        json[i].poly = new google.maps.Polygon({
            path: makePath(paths[i]),
            strokeColor: "#222",
            strokeWeight: '2',
            fillColor: '#ff0000',
            fillOpacity: '0.5',
            map: map
        })
        google.maps.event.addListener(map, 'click', function () {
            showStats(-1);
        })
        google.maps.event.addListener(json[i].poly, 'click', function () {
            showStats(i)
        })
    }
    map.mapTypes.set('Minimal Map', styledMap);
    map.setMapTypeId('Minimal Map');


    //Has to be called AFTER everything else
}

function run() {
    for (x = 0; x < 12; x++) {
        addP(x);
        json[x].happiness = happiness(x);
        json[x].oppression = oppression(x);

    }
}
var paths = [[[51.7,-0.4339],[51.71,-0.4284],[51.71,-0.379],[51.7,-0.3309],[51.71,-0.2732],[51.68,-0.2252],[51.68,-0.1771],[51.6879,-0.1579],[51.6913,-0.1099],[51.6828,-0.0618],[51.6785,0.0096],[51.6785,0.0316],[51.6879,0.0824],[51.6896,0.0989],[51.647,0.2074],[51.6018,0.2705],[51.5583,0.2911],[51.4249,0.2376],[51.3632,0.1538],[51.3066,0.1593],[51.2679,0.0137],[51.2654,-0.1456],[51.2559,-0.2252],[51.2696,-0.2554],[51.2928,-0.2911],[51.3074,-0.4147],[51.3383,-0.4875],[51.4155,-0.5424],[51.5344,-0.5054],[51.5677,-0.537],[51.6155,-0.5273],[51.6691,-0.4903]],[[55.8291,-2.0544],[55.6156,-1.7908],[55.5037,-1.582],[55.1695,-1.5161],[54.9823,-1.3678],[54.8829,-1.3733],[54.5721,-0.9448],[54.5673,-0.8226],[54.5243,-0.7004],[54.4844,-0.8611],[54.5139,-1.2325],[54.4812,-1.4008],[54.5091,-1.582],[54.5175,-1.777],[54.4541,-1.9446],[54.4621,-2.1259],[54.3838,-2.2879],[54.5019,-2.6024],[54.7595,-2.8207],[55.0516,-3.1064],[55.1326,-2.8358],[55.376,-2.3401]],[[54.9886,-3.0432],[54.7627,-2.8235],[54.4956,-2.6038],[54.387,-2.2824],[54.2339,-2.4019],[54.1029,-2.5269],[54.0626,-2.45],[53.9561,-2.1863],[53.8347,-2.0462],[53.6463,-2.049],[53.4766,-1.7908],[53.506,-1.9418],[53.3669,-2.0297],[53.2258,-1.9995],[52.9751,-2.4939],[52.942,-2.8125],[53.0742,-2.8564],[53.2849,-3.1091],[53.488,-3.1201],[53.9238,-3.0542],[53.969,-2.8894],[54.0465,-2.9251],[54.1109,-2.796],[54.1946,-2.8674],[54.1624,-2.9443],[54.2026,-3.035],[54.04,-3.197],[54.0916,-3.2849],[54.2716,-3.186],[54.1833,-3.3151],[54.4125,-3.5046],[54.5083,-3.631],[54.7753,-3.4827],[54.9413,-3.4827],[55.0485,-3.1064]],[[53.3395,-1.1594],[53.3213,-1.1886],[53.322,-1.5042],[53.3725,-1.653],[53.45,-1.75],[53.55,-1.9],[53.65,-2.05],[53.84,-2.05],[53.96,-2.19],[54.02,-2.36],[54.1,-2.53],[54.23,-2.4],[54.38,-2.29],[54.46,-2.13],[54.45,-1.95],[54.52,-1.78],[54.51,-1.59],[54.48,-1.42],[54.51,-1.24],[54.5,-1.05],[54.48,-0.87],[54.52,-0.69],[54.45,-0.52],[54.31,-0.41],[54.18,-0.27],[54.13,-0.09],[53.98,-0.2],[53.84,-0.09],[53.72,0.05],[53.6139,0.1546],[53.6406,-0.0348],[53.5255,-0.0127],[53.4814,-0.1837],[53.61,-0.29],[53.5323,-0.4051],[53.4682,-0.5715],[53.5221,-0.7268],[53.4635,-0.8784],[53.4313,-1.0386]],[[52.5766,-0.3544],[52.52,-0.38],[52.38,-0.4243],[52.2584,-0.4666],[52.1597,-0.5013],[52.0706,-0.6884],[52.1233,-0.848],[52.0361,-1.0859],[52.0103,-1.1408],[51.991,-1.2166],[52.1815,-1.3067],[52.3282,-1.2292],[52.4565,-1.2615],[52.52,-1.3786],[52.5667,-1.5067],[52.6983,-1.6002],[52.7451,-1.6986],[52.8383,-1.602],[52.87,-1.74],[53.03,-1.76],[53.17,-1.83],[53.21,-1.99],[53.37,-2.03],[53.5049,-1.94],[53.47,-1.78],[53.37,-1.65],[53.32,-1.49],[53.32,-1.33],[53.33,-1.17],[53.43,-1.04],[53.46,-0.88],[53.52,-0.73],[53.4682,-0.57],[53.52,-0.42],[53.61,-0.28],[53.48,-0.19],[53.52,-0.03],[53.5,0.13],[53.38,0.24],[53.25,0.33],[53.09,0.33],[53.03,0.18],[52.92,0.06],[52.8217,0.2467],[52.72,0.08],[52.6633,-0.0206],[52.66,-0.23],[52.6733,-0.3213],[52.6067,-0.3517]],[[52.69,-1.59],[52.57,-1.51],[52.52,-1.38],[52.45,-1.26],[52.32,-1.2318],[52.19,-1.3],[52.186,-1.3039],[52.02,-1.51],[51.9394,-1.6143],[52.1102,-1.7657],[52.0632,-1.8343],[52.03,-1.8919],[52.0118,-2.1235],[52.0206,-2.2223],[52.0237,-2.3321],[51.89,-2.5],[51.84,-2.64],[51.86,-2.77],[51.92,-2.9],[51.96,-3.03],[51.9889,-3.0651],[52.1738,-3.1127],[52.21,-3.1],[52.2684,-3.0881],[52.3533,-3.07],[52.4602,-3.2137],[52.5184,-3.1706],[52.64,-3.07],[52.7666,-3.0112],[52.8829,-3.1477],[52.9581,-2.9731],[52.983,-2.8331],[52.9381,-2.8075],[52.9553,-2.7177],[52.9632,-2.5465],[52.9751,-2.4916],[53.08,-2.28],[53.1485,-2.1508],[53.2213,-2.0015],[53.2131,-1.9933],[53.172,-1.8313],[53.11,-1.79],[52.985,-1.7503],[52.87,-1.75],[52.84,-1.61],[52.74,-1.7],[52.69,-1.59]],[[52.9619,0.4834],[52.8227,0.2417],[52.6631,-0.022],[52.6697,-0.3186],[52.1605,-0.5054],[51.7933,-1.1673],[51.5634,-1.0052],[51.3512,-0.4999],[51.43,-0.5493],[51.5361,-0.5164],[51.5754,-0.5411],[51.6615,-0.5067],[51.7147,-0.4319],[51.7089,-0.2681],[51.6726,-0.2197],[51.6828,-0.1868],[51.6955,-0.114],[51.6777,0.0302],[51.6887,0.0948],[51.6657,0.1758],[51.6146,0.2513],[51.5634,0.3049],[51.4266,0.2417],[51.3585,0.1641],[51.2971,0.1634],[51.3014,0.2335],[51.4899,0.4532],[51.5566,0.9119],[51.8154,1.2195],[51.9375,1.2964],[52.0998,1.637],[52.4677,1.7496],[52.7097,1.7249],[52.9238,1.3705],[52.9817,0.9119]],[[51.4882,0.4614],[51.3031,0.2307],[51.243,-0.1895],[51.31,-0.4285],[51.3718,-0.5603],[51.5566,-0.9998],[51.795,-1.1646],[52.066,-0.6757],[52.1217,-0.8542],[51.9849,-1.2195],[52.179,-1.3156],[51.9392,-1.6177],[51.7338,-1.6891],[51.5139,-1.5875],[51.298,-1.5244],[51.0897,-1.6425],[51.0103,-1.8567],[50.7955,-1.7963],[50.7191,-1.5683],[50.7712,-1.3623],[50.7312,-0.7855],[50.8545,-0.2307],[50.6947,0.2966],[50.9238,0.824],[50.8961,0.9558],[51.0828,1.1646],[51.1587,1.4063],[51.3512,1.4172]],[[52.11,-1.77],[51.94,-1.62],[51.73,-1.69],[51.52,-1.59],[51.3,-1.53],[51.09,-1.64],[51.01,-1.85],[50.79,-1.8],[50.62,-1.96],[50.62,-2.19],[50.63,-2.41],[50.67,-2.64],[50.73,-2.86],[50.7,-3.09],[50.63,-3.3],[50.52,-3.51],[50.32,-3.6],[50.21,-3.81],[50.3,-4.02],[50.34,-4.24],[50.34,-4.47],[50.35,-4.69],[50.22,-4.88],[50.13,-5.09],[50.08,-5.31],[50.11,-5.54],[50.24,-5.35],[50.35,-5.15],[50.54,-5.02],[50.6,-4.8],[50.75,-4.63],[50.96,-4.54],[51.0234,-4.5179],[50.99,-4.32],[51.19,-4.21],[51.22,-3.98],[51.24,-3.75],[51.23,-3.53],[51.18,-3.3],[51.2,-3.08],[51.39,-2.96],[51.49,-2.75],[51.6693,-2.6563],[51.8393,-2.6403],[51.88,-2.52],[52.02,-2.34],[52.0218,-2.23],[52.01,-2.12],[52.03,-1.89],[52.11,-1.77]],[[51.62,-3.88],[51.56,-4.05],[51.54,-4.24],[51.6137,-4.3216],[51.66,-4.09],[51.68,-4.28],[51.77,-4.45],[51.73,-4.63],[51.64,-4.79],[51.61,-4.98],[51.72,-5.13],[51.87,-5.23],[51.99,-5.08],[52.03,-4.9],[52.11,-4.73],[52.14,-4.55],[52.21,-4.38],[52.27,-4.2],[52.42,-4.09],[52.6,-4.12],[52.79,-4.13],[52.8771,-4.1738],[52.91,-4.21],[52.89,-4.39],[52.81,-4.56],[52.78,-4.74],[52.92,-4.62],[52.99,-4.45],[53.12,-4.32],[53.22,-4.16],[53.26,-3.98],[53.32,-3.8],[53.29,-3.62],[53.34,-3.43],[53.31,-3.25],[53.2809,-3.1185],[53.0804,-2.8586],[52.985,-2.8302],[52.96,-2.98],[52.88,-3.15],[52.76,-3.01],[52.6,-3.1],[52.46,-3.22],[52.35,-3.07],[52.17,-3.11],[51.99,-3.07],[51.92,-2.9],[51.8554,-2.7711],[51.8349,-2.6421],[51.67,-2.66],[51.5894,-2.6993],[51.56,-2.81],[51.54,-2.99],[51.45,-3.16],[51.4063,-3.1763],[51.39,-3.33],[51.4,-3.52],[51.48,-3.69],[51.6,-3.83],[51.62,-3.88]],[[55.2,-6.67],[55.25,-6.49],[55.23,-6.31],[55.22,-6.13],[55.1712,-6.0246],[55.05,-5.9823],[54.93,-5.89],[54.85,-5.73],[54.7703,-5.6696],[54.7,-5.84],[54.67,-5.66],[54.6775,-5.5855],[54.58,-5.5],[54.4,-5.46],[54.3804,-5.4756],[54.3412,-5.5162],[54.2393,-5.6389],[54.24,-5.8],[54.09,-5.91],[54.03,-6.08],[54.1,-6.26],[54.06,-6.44],[54.04,-6.62],[54.19,-6.73],[54.32,-6.86],[54.42,-7.03],[54.31,-7.18],[54.14,-7.26],[54.15,-7.45],[54.17,-7.64],[54.21,-7.85],[54.34,-7.98],[54.44,-8.16],[54.54,-8],[54.56,-7.82],[54.72,-7.72],[54.79,-7.54],[54.94,-7.43],[55.05,-7.28],[55.04,-7.09],[55.17,-6.96],[55.17,-6.77],[55.2,-6.67]],[[55.95,-3.08],[56,-2.55],[55.83,-2.05],[55.38,-2.34],[55.14,-2.81],[54.98,-3.32],[54.8758,-3.58],[54.7745,-4.0268],[54.87,-4.37],[54.668,-4.3658],[54.8653,-5.1307],[55.1134,-5.0163],[55.36,-4.77],[55.87,-4.89],[55.7628,-5.2187],[55.3278,-5.5639],[55.2906,-5.8154],[56.01,-5.6],[56.51,-5.42],[56.4935,-5.68],[56.58,-5.94],[56.8016,-5.9183],[56.98,-5.6],[57.45,-5.86],[57.6946,-5.8059],[57.92,-5.62],[57.8821,-5.2886],[58.2425,-5.3911],[58.37,-5.17],[58.5987,-4.9392],[58.56,-4.14],[58.62,-3.61],[58.65,-3.08],[58.3737,-3.0572],[58.24,-3.43],[57.99,-3.89],[57.8409,-3.7869],[57.6324,-4.0463],[57.62,-3.78],[57.71,-3.25],[57.69,-2.72],[57.6976,-1.9584],[57.4815,-1.779],[57.15,-2.08],[56.76,-2.43],[56.46,-2.87],[56.2666,-2.5836],[56.06,-3.22],[56.08,-3.75],[55.99,-3.23],[55.95,-3.08]]],
defaultJSON = [{
    id: 0,
    name: "London",
    population: 8174000,
    density: 5200,
    gva: 30385,
    crime: 104,
    schools: 4764,
    hospitals: 80
}, {
    id: 1,
    name: "North East England",
    population: 2597000,
    density: 302,
    gva: 15688,
    crime: 59,
    schools: 1967,
    hospitals: 28
}, {
    id: 2,
    name: "North West England",
    population: 7052000,
    density: 498,
    gva: 17433,
    crime: 70,
    schools: 5469,
    hospitals: 49
}, {
    id: 3,
    name: "Yorkshire & the Humber",
    population: 5284000,
    density: 343,
    gva: 16880,
    crime: 74,
    schools: 4117,
    hospitals: 69
}, {
    id: 4,
    name: "East Midlands",
    population: 4533000,
    density: 290,
    gva: 17698,
    crime: 67,
    hospitals: 23,
    schools: 3260
}, {
    id: 5,
    name: "West Midlands",
    population: 5602000,
    density: 431,
    gva: 17161,
    crime: 66,
    hospitals: 39,
    schools: 4122
}, {
    id: 6,
    name: "East of England",
    population: 5847000,
    density: 306,
    gva: 20524,
    crime: 59,
    hospitals: 31,
    schools: 4055
}, {
    id: 7,
    name: "South East England",
    population: 8635000,
    density: 452,
    gva: 22624,
    crime: 63,
    hospitals: 26,
    schools: 5850
}, {
    id: 8,
    name: "South West England",
    population: 5289000,
    density: 222,
    gva: 18195,
    crime: 61,
    schools: 3898,
    hospitals: 39
}, {
    id: 9,
    name: "Wales",
    population: 3064000,
    density: 148,
    gva: 19530,
    crime: 63,
    schools: 1833,
    hospitals: 106
}, {
    id: 10,
    name: "Northern Ireland",
    population: 1810900,
    density: 131,
    gva: 19603,
    crime: 55,
    schools: 1210,
    hospitals: 33
}, {
    id: 11,
    name: "Scotland",
    population: 5062011,
    density: 65,
    gva: 26766,
    crime: 82,
    schools: 2755,
    hospitals: 222
}],
buildings = {
	schools:{
		cost:2000,
		amount:30
	},
	hospitals:{
		cost:4000,
		amount:3
	},
	armies:{
		cost:10000,
		amount:2
	}
}