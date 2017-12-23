window.onload =function(){$(function() {

    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Pharmacy A Sales",
            value: 50
        }, {
            label: "Pharmacy B Sales",
            value: 6000
        }, {
            label: "Pharmacy C Sales",
            value: 20
        }, {
            label: "Pharmacy D Sales",
            value: 20
        }, {
            label: "Pharmacy E Sales",
            value: 20
        }, {
            label: "Pharmacy C Sales",
            value: 20
        }, {
            label: "Pharmacy C Sales",
            value: 20
        }, {
            label: "Pharmacy C Sales",
            value: 20
        }],
		//colors: [ 'orange', 'brown', 'black'],
		//colors: [ 'blue', 'green','grey'],
		//colors: [ 'black', 'navy', '#aaa'],
        resize: true
    });
Send("./php/Home.php","GET",function(data){
    k=[];
	l=[]
	$.each(data.Pharmacies,function(key,value){ k.push(value.Pharmacy_Number); l.push("Pharmacy "+value.Pharmacy_Number);})
	console.log(k);
    Morris.Bar({
        element: 'morris-bar-chart',
			data: data.statstics,
        xkey: "Month",
        ykeys:k ,
        labels: l,
        hideHover: 'auto',
		  xLabelAngle: 40,
        resize: false
		
    });
    
		 
 });
	
    /*Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2010 Q1',
            iphone: 2666,
            ipad: null,
            itouch: 2647
        }, {
            period: '2010 Q2',
            iphone: 2778,
            ipad: 2294,
            itouch: 2441
        }, {
            period: '2010 Q3',
            iphone: 4912,
            ipad: 1969,
            itouch: 2501
        }, {
            period: '2010 Q4',
            iphone: 3767,
            ipad: 3597,
            itouch: 5689
        }, {
            period: '2011 Q1',
            iphone: 6810,
            ipad: 1914,
            itouch: 2293
        }, {
            period: '2011 Q2',
            iphone: 5670,
            ipad: 4293,
            itouch: 1881
        }, {
            period: '2011 Q3',
            iphone: 4820,
            ipad: 3795,
            itouch: 1588
        }, {
            period: '2011 Q4',
            iphone: 15073,
            ipad: 5967,
            itouch: 5175
        }, {
            period: '2012 Q1',
            iphone: 10687,
            ipad: 4460,
            itouch: 2028
        }, {
            period: '2012 Q2',
            iphone: 8432,
            ipad: 5713,
            itouch: 1791
        }],
        xkey: 'period',
        ykeys: ['iphone', 'ipad', 'itouch'],
        labels: ['iPhone', 'iPad', 'iPod Touch'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });*/
	
});
}