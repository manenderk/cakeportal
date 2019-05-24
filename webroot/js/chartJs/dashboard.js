var dashboard = function(){
    
var xAxisScale, yAxisScale, xAxis, yAxis;

var salesData = [
    {
        actual: "2.65",
        actual_amount: "24800.00",
        ax1: 1,
        ax2: 2,
        ay1: 275.75667980727115,
        ay2: 271.9240035041612,
        budget: 935000,
        color: 0,
        forecast: "15.06",
        forecast_amount: "140800.00",
        max_limit: 20,
        month: 1,
        monthName: "Jan"
    },
    {
        actual: "5.05",
        actual_amount: "47200.00",
        ax1: 2,
        ax2: 3,
        ay1: 271.9240035041612,
        ay2: 267.68068331143235,
        budget: 935000,
        color: 0,
        forecast: "30.46",
        forecast_amount: "284800.00",
        max_limit: 20,
        month: 2,
        monthName: "Feb"
    },
    {
        actual: "7.70",
        actual_amount: "72000.00",
        ax1: 3,
        ax2: 4,
        ay1: 267.68068331143235,
        ay2: 259.46780551905385,
        budget: 935000,
        color: 0,
        forecast: "46.85",
        forecast_amount: "437920.00",
        max_limit: 20,
        month: 3,
        monthName: "Mar"
    },
    {
        actual: "12.83",
        actual_amount: "120000.00",
        ax1: 4,
        ax2: 5,
        ay1: 259.46780551905385,
        ay2: 250.98116513359614,
        budget: 935000,
        color: 0,
        forecast: "65.31",
        forecast_amount: "610400.00",
        max_limit: 20,
        month: 4,
        monthName: "Apr"
    },
    {
        actual: "18.14",
        actual_amount: "169600.00",
        ax1: 5,
        ax2: 6,
        ay1: 250.98116513359614,
        ay2: 242.7682873412177,
        budget: 935000,
        color: 0,
        forecast: "81.50",
        forecast_amount: "761600.00",
        max_limit: 20,
        month: 5,
        monthName: "May"
    },
    {
        actual: "23.27",
        actual_amount: "217600.00",
        ax1: 6,
        ax2: 7,
        ay1: 242.7682873412177,
        ay2: 230.0383267630311,
        budget: 935000,
        color: 0,
        forecast: "89.05",
        forecast_amount: "832000.00",
        max_limit: 20,
        month: 6,
        monthName: "Jun"
    }

]


var tip = d3.tip()
    .attr('class', 'd3-tip')
    .offset([-10, 0])
    .html(function(d) {
        return "<strong>No. of Submissions in "+d.month+":"+10+"</strong>";
    })

/*var tipA = d3.tip()*/
/*    .attr('class', 'd3-tip')*/
/*    .offset([-10, 0])*/
/*    .html(function(d) {*/
/*        if(d.color>0)*/
/*            return "<strong>Forecast in "+d.monthName+":</strong> <span style='color:red'>" + d.actual_amount + "</span>";*/
/*        else*/
/*            return "<strong>Actual in "+d.monthName+":</strong> <span style='color:red'>" + d.actual_amount + "</span>";*/
/*    })*/
/*
*/

/*var tipB = d3.tip()*/
/*    .attr('class', 'd3-tip')*/
/*    .offset([-10, 0])*/
/*    .html(function(d) {*/
/*        return "<strong>Budget: </strong><span style='color:red'>" + d.actual_amount + "</span>";*/
/*    })*/

//Create the SVG Viewport
var svgContainer = d3.select("body").select("#lineProjectsGraph");

svgContainer.call(tip);

var rotateTranslate = d3.svg.transform().translate(-320, 350).rotate(-90).translate(120, 100);

var jsonCircles=[
    {"month": "Jan", "height": 175, "color" : "blue", "status" : "down" },
    {"month": "Feb", "height": 100, "color" : "blue", "status" : "up" },
    {"month": "Mar", "height": 120, "color" : "blue", "status" : "up" },
    {"month": "Apr", "height": 175, "color" : "blue", "status" : "down" },
    {"month": "May", "height": 20, "color" : "blue", "status" : "up" },
    {"month": "Jun", "height": 150, "color" : "blue", "status" : "up" }
];
for(x in jsonCircles){
    jsonCircles[x].x_axis = (22 +9)*x + 45;
    jsonCircles[x].bigx_axis = (50 +9)*x + 45;
    jsonCircles[x].y_axistext = (60)*x;
}

var formatPercent = d3.format("%");

function setChartAxes(limit) {

    //Create the Scale we will use for the Axis
    var xAxisScale = d3.scale.linear()
        .domain(d3.extent(jsonCircles, function(d) { return d.month; })).nice()
        .range([0, 750]);

    var yPositiveAxisScale = d3.scale.linear()
        .domain([limit, 0])
        .range([0, 250]);

    //Create the Axis
    var xAxis = d3.svg.axis()
        .scale(xAxisScale)
        .orient("bottom");

    var yPositiveAxis = d3.svg.axis()
        .scale(yPositiveAxisScale)
        .orient("left")
        .tickFormat(function(limit){
            if ((limit / 1000) >= 1) {
                limit = limit / 1000 + "K";
            }
            return limit;
        });

    //Create an SVG group Element for the Axis elements and call the xAxis function
    var xAxisGroup = svgContainer.append("g")
        .attr("transform", "translate(60,280)")
        .attr("class", "axis")
        .call(xAxis);

    var yPositiveAxisGroup = svgContainer.append("g")
        .attr("transform", "translate(60,30)")
        .attr("class", "axis")
        .call(yPositiveAxis);

}
var counter = 0;
function drawChart() {

    var yTickValue = (salesData[0].max_limit) + (0.2*salesData[0].max_limit);
    var budgetValue = (salesData[0].budget);


    salesData = salesData.map(function (point, index, arr) {
        var next = arr[index + 1],
            prev = arr[index - 1];
        return {
            actual:point.actual,
            actual_amount:point.actual_amount,
            budget:point.budget,
            color:point.color,
            forecast:point.forecast,
            forecast_amount:point.forecast_amount,
            max_limit:point.max_limit,
            month:point.month,
            monthName:point.monthName,
            ax1: point.month,
            ay1: (280 - (point.actual_amount/yTickValue)*250),
            ax2: (next) ? next.month : prev.month,
            ay2: (next) ?  (280 - (next.actual_amount/yTickValue)*250) :  (280 - (prev.actual_amount/yTickValue)*250)
        };
    });

    console.log(salesData);


    console.log("Project: Actual - Forecast");
    console.log(salesData);
    for(x in salesData){
        console.log(salesData[x].color == 1);
    }

    var monthNameData = [
        {month:"Jan",x:"0"},
        {month:"Feb",x:"1"},
        {month:"Mar",x:"2"},
        {month:"Apr",x:"3"},
        {month:"May",x:"4"},
        {month:"Jun",x:"5"},
        {month:"Jul",x:"6"},
        {month:"Aug",x:"7"},
        {month:"Sep",x:"8"},
        {month:"Oct",x:"9"},
        {month:"Nov",x:"10"},
        {month:"Dec",x:"11"}
    ];

    svgContainer.selectAll("g").remove();
    svgContainer.selectAll("line").remove();

    svgContainer.append("text")
        .attr("x", "100")
        .attr("y", "30")
        .text("")
        .attr("fill", "black")
        .attr("id", "textlabel")
        .attr("class", "graph-heading")
        .attr("font-size", "14");

    svgContainer.append("text")
        .text("No. of Submissions")
        .attr("fill", "black")
        .attr("id", "textlabel")
        .attr("class", "graph-heading")
        .attr("font-size", "12")
        .attr("transform", rotateTranslate)
        .attr("x", "0")
        .attr("y", "230");


    var upDownStatus = function(d){
        /*if(d.status == 'up'){*/
            return d3.svg.transform()
                .translate(0, 250 - d.height)();
        /*}
        else if(d.status == 'down'){
            return d3.svg.transform()
                .translate(0, 181)();
        }*/
    }

    var textGroup = svgContainer.append("g")
        .attr("id", "groupOfPaths")

    var textLabel = textGroup.selectAll("text")
        .data(monthNameData)
        .enter()
        .append("text");
    var textLabelAttributes = textLabel
        .attr("x", function(d) { return d.x*38+4 + 55; })
        .attr("y", function(d) { return 300; })
        .text(function(d) { return d.month; })
        .attr("fill", "black")
        .attr("z-index", "10");


    setChartAxes(yTickValue);

    var rectangle = svgContainer.selectAll("rect")
        .data(jsonCircles)
        .enter()
        .append("rect");
    var circleAttributes = rectangle
        .attr("x", function (d) { return d.x_axis + 20})
        .attr("y", 30)
        .attr("width", function (d) { return 20; })
        .attr("height", function (d) { return d.height; })
        .attr("transform", upDownStatus)
        .style("fill", function(d) { return d.color; })
		.on('mouseover', tip.show)
		.on('mouseout', tip.hide);



    console.log('-------------- Sales Data ------------------');
    console.log(salesData);
}

function redrawLineChart() {

    setChartAxes();

}

drawChart();

}
