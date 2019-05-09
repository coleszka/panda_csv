$.getJSON('../../json/myfile.json')
   .done(function (data) {
       json = data;
       console.log(json);
       var dataPoints = [];
       for(key in json){
         dataPoints.push({label: key, y: json[key]});
       }

       var chart = new CanvasJS.Chart("chartContainer",
       {

           data: [
           {
             type: "column",
             dataPoints: dataPoints
           }
           ]
         });

       chart.render();
   });
