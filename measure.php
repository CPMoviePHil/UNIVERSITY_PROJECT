<?php
session_start();
if(empty($_SESSION['login_userid'])){
    session_destroy();
    header("Location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>

    <style>
    path {stroke-width: 4;fill: none;}
    .axis {shape-rendering: crispEdges;}
    .x.axis line {stroke: lightgrey;}
    .x.axis .minor {stroke-opacity: .5;}
    .x.axis path {display: none;}
    .y.axis line, .y.axis path {fill: none;stroke: #000;stroke-width: 1;}
</style>

<title>Measure</title>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="custom_css/dash4_top_nav.css" rel="stylesheet">
<link href="custom_css/measure_css.css" rel="stylesheet">
<link href="custom_css/custom_sidebar.css" rel="stylesheet">
<link href="custom_css/date_map_css.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Custom Fonts -->

</head>

<body>
    <!-- sidebar and topnav -->
    <div id="wrapper">
        <div class="overlay"></div>
        <!-- Sidebar -->
        <nav id="sidebar">
          <div class="sidebar-header">
            <div class="text-right"><h2>PULSER 2.0</h2></div>
            <div id="dismiss"><span class="glyphicon glyphicon-remove"></span></div></div>
            <ul class="list-unstyled components">
                <li class="active"><a href="dash4.php"><label>Dashboard</label></a></li>
                <div class="sidebar_inside_padding1"></div>
                <li><a href="measure.php"><span class="glyphicon glyphicon-stats"></span>開始測量</a></li>
                <li><a href="date_map1.php"><span class="glyphicon glyphicon-th-list"></span>紀錄搜尋</a></li>
                <li><a href="info.php"><span class="glyphicon glyphicon-book"></span>說明</a></li>
                <li><a href="about.php"><span class="glyphicon glyphicon-info-sign"></span>關於我們</a></li>
            </ul>
            <ul class="list-unstyled CTAs">
                <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>首頁</a></li>
                <li><a href="profile.php"><span class="glyphicon glyphicon-cog"></span>個人資訊設定</a></li>
            </ul>
        </nav>
        <!--Sidebar-->
        <div style="height:5px;background: #000;"></div>
        <!-- top-nav -->
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid" id="navbar-container">
                <div class="navbar-header">
                    <button id="theButton" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="glyphicon glyphicon-chevron-down"></span> 
                    </button>
                    <a class="navbar-brand"><i id="sidebarCollapse" class="fa fa-bars" aria-hidden="true"></i></a>
                    <a id="homepage" class="navbar-brand" href="index.php"><i class="fa fa-home" aria-hidden="true"></i><label>PULSER 2.0</label></a>

                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                   <ul class="nav navbar-nav navbar-right">
                    <li><a href="profile.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i><?php echo($_SESSION['login_userid']);?></a></li>
                    <li><a href="logout.php"><i id="sign_out_i" class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>
        <!--<ul class="nav navbar-nav navbar-left">
            <li>
                <a href="index.php">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <label>PULSER 2.0</label>
                </a>
            </li>
            <li class="menu"><a><i id="sidebarCollapse" class="fa fa-bars" aria-hidden="true"></i></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="profile.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i><?php echo($_SESSION['login_userid']);?></a></li>
            <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
        </ul>-->

        <!-- top-nav -->
    </div>
    <!-- sidebar and topnav -->
    <!-- page-wrapper -->
    <div id="page-wrapper">
        <!-- page-wrapper-container-fluid -->
        <div class="container-fluid">
         <!--row of dashboard4.0-->
         <div class="row">
            <div style="height:20px;"></div>
            <div class="container-fluid text-center">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <label id="page-header">開始測量</label>
                </div>
            </div>
            <div class="clearfix"></div>
            <div style="height:20px;"></div>
        </div>
        <div class="text-center dash_title list-unstyled">
          <li>
            <a><span class="glyphicon glyphicon-calendar dash4_today_span"></span></a>
            <label id="today-label">今天</label><label id="DATE"></label>
        </li>
    </div>
    <div style="height:20px;"></div>
    <!--row of dashboard4.0-->


    <!--4panel-row-->

    <!--4panel-row-->

    <!--RAW-->

    <div class="dash4_map">

        <div class="panel panel-default">
            <div class="panel-heading">
                <div id="container_chart" class="svg-container"></div>
            </div>
            <div class="panel-body">
                <div style="display: inline;">
                    <button id='button1' type="button" class="btn btn-danger">RAW</button>
                    <button id="submitData_fft" type="button" class="btn btn-success">FFT</button>
                </div>
            </div>
            <div class="panel-footer">
                <div style="font-family: Arial Black, sans-serif;font-size:20px;" id='count'>START</div>
            </div>
        </div>
    </div>
    <!-- page-wrapper-container-fluid -->
    <div style="height:40px;"></div>

</div>
<!-- page-wrapper -->



<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type='text/javascript'></script>

<!--custom_javascript-->
<script src="js/date_map_map.js"></script>
<script src="js/today_date.js"></script>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
      $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

      $('#dismiss, .overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('.overlay').fadeOut();
    });

      $('#sidebarCollapse').on('click', function () {
        $('#sidebar').addClass('active');
        $('.overlay').fadeIn();
        $('.collapse.in').toggleClass('in');
    });
  });
</script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<script>
    let counter;
    let timer;
    let chunks;
    let finalChunks;
    let count;
    let theData;

    let audioInput = null;
    let microphone_stream;
    let gain_node = null;
    let script_processor_node;
    $('#button1').click(function(){
        counter = 30;
        theData = 0;
        chunks = [];
        count = 0;
        finalChunks = [];
        d3.select("svg").remove();

        window.AudioContext = window.AudioContext || window.webkitAudioContext;

        if (!navigator.getUserMedia){
            navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
        }

        if(navigator.getUserMedia)
        {
            navigator.getUserMedia
            (
                {audio:true}, 
                function(stream){
                    start_microphone(stream);
                },
                function(e){
                    alert('Error capturing audio.');
                }
                );
        }
        else
        {
            alert('getUserMedia not supported in this browser.');
        }

    });
    function process_microphone_buffer(event) {
        theData = event.inputBuffer.getChannelData(0);
    }


    function start_microphone(stream){
        let context = new AudioContext();
        let BUFF_SIZE_RENDERER = 16384;
        microphone_stream = context.createMediaStreamSource(stream);

        script_processor_node = context.createScriptProcessor(1024,1,1);
        script_processor_node.onaudioprocess = process_microphone_buffer;

        microphone_stream.connect(script_processor_node);

        update();

        function update()
        {
            console.log(theData);
            timer = setTimeout(update,1000);
            if(theData !== 0){
                chunks.push(Array.from(theData));
                count++;
                counter--;
                if (counter >= 0) {
                    span = document.getElementById("count");
                    span.innerHTML = counter;
                }
                if (counter === 0) {
                    document.getElementById("count").innerHTML = "START";
                    clearInterval(counter);
                }
            }
            if(count === 30)
            {
                clearTimeout(timer);
                console.log((chunks));
                stream.getTracks()[0].stop();
                let i;
                let j;
                for( i = 0;i<chunks.length;i++)
                {
                    for( j = 0;j<1024;j++)
                    {
                        finalChunks.push(chunks[i][j]);
                    }
                }
                console.log(finalChunks);
                console.log(finalChunks.length);
                getRaw(finalChunks);
                $.post("fromListenPulse.php",{data:finalChunks.join()},function(e){
                    console.log(e);
                });
            }
        }
    }
    function getRaw(rawData){
        d3.select("svg").remove();

        let newData = rawData;
        let data = [];
        let i = 0;

        for(i=0;i<newData.length;i++){
            data[i] = parseFloat(newData[i]);
        }

        console.log(d3.max(data));
        console.log(d3.min(data));

    var m = [80, 80, 80, 80]; // margins
    var w = 1300- m[1] - m[3]; // width
    var h = 500 - m[0] - m[2]; // height
    var x = d3.scale.linear().domain([0, data.length]).range([0, w]);

    var x1 = d3.scale.ordinal().domain(["0","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16",
        "17","18","19","20","21","22","23","24","25","26","27","28","29","30"]).rangePoints([0, w]);

    var y = d3.scale.linear().domain([d3.min(data), d3.max(data)]).range([h, 0]);


    var graph = d3.select("div#container_chart")
    .append("svg:svg")
    .attr("preserveAspectRatio", "xMinYMin meet")
    .attr("viewBox", "0 0 1300 500")
    .classed("svg-content", true)
    .append("svg:g")
    .attr("transform", "translate(" + m[3] + "," + m[0] + ")");
    

    // create yAxis
    var xAxis = d3.svg.axis()
    .scale(x1)
    .tickPadding(15)
    .tickSize(-h);

//0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30]

    // Add the x-axis.
    graph.append("svg:g")
    .attr("class", "x axis")
    .attr("transform", "translate(0," + h + ")")
    .call(xAxis)
    .style("font-size","18px")
    .select(".domain")
    .remove();


    graph.append("svg:text")      // text label for the x axis
    .attr("x", 560 )
    .attr("y", 410 )
    .style("text-anchor", "middle")
    .style("font-size","25px")
    .style("font-weight","bold")
    .text("時間軸(30秒)");

    var yAxisLeft = d3.svg.axis().scale(y).ticks(6).orient("left");
    // Add the y-axis to the left
    graph.append("svg:g")
    .attr("class", "y axis")
    .style("font-size","18px")
    .attr("transform", "translate(-25,0)")
    .call(yAxisLeft);

    graph.selectAll("scatter-dots")
    .data(data)
    .enter().append("svg:circle")
    .attr("cx", function (d,i) {  return x(i);  } )
    .attr("cy", function (d) {  return y(d);  } )
    .attr("r", 4)
    .attr("fill","#002259");

}

</script>
<script>
    $('#submitData_fft').click(function(){
        counter = 30;
        theData = 0;
        chunks = [];
        count = 0;
        finalChunks = [];
        d3.select("svg").remove();
        window.AudioContext = window.AudioContext || window.webkitAudioContext;

        if (!navigator.getUserMedia){
            navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
        }

        if(navigator.getUserMedia)
        {
            navigator.getUserMedia
            (
                {audio:true}, 
                function(stream){
                    start_microphone_FFT(stream);
                },
                function(e){
                    alert('Error capturing audio.');
                }
                );
        }
        else
        {
            alert('getUserMedia not supported in this browser.');
        }

    });

    function process_microphone_buffer_FFT(event) {
        theData = event.inputBuffer.getChannelData(0);
    }


    function start_microphone_FFT(stream){
        let context = new AudioContext();
        let BUFF_SIZE_RENDERER = 16384;
        microphone_stream = context.createMediaStreamSource(stream);

        script_processor_node = context.createScriptProcessor(1024,1,1);
        script_processor_node.onaudioprocess = process_microphone_buffer_FFT;

        microphone_stream.connect(script_processor_node);

        updateFFT();

        function updateFFT()
        {
            console.log(theData);
            timer = setTimeout(updateFFT,1000);
            if(theData !== 0){
                chunks.push(Array.from(theData));
                count++;
                counter--;
                if (counter >= 0) {
                    span = document.getElementById("count");
                    span.innerHTML = counter;
                }
                if (counter === 0) {
                    document.getElementById("count").innerHTML = "START";
                    clearInterval(counter);
                }
            }
            if(count === 30)
            {
                clearTimeout(timer);
                console.log((chunks));
                stream.getTracks()[0].stop();
                let i;
                let j;
                for( i = 0;i<chunks.length;i++)
                {
                    for( j = 0;j<1024;j++)
                    {
                        finalChunks.push(chunks[i][j]);
                    }
                }

                console.log(finalChunks);
                console.log(finalChunks.length);
                $.post("fromPulseToFFT.php",{data:finalChunks.join()},function(e){
                    console.log(e);
                    callPythonFFT();
                });
            }
        }
    }
    function callPythonFFT(){
        $.ajax({
            type: 'GET',
            url: 'sentDataToPythonFFT.php',
            dataType: "json",  
            success: function(data) {
                getFFT(data[4]);
            },
            error: function() {
                alert("ERROR");
            }
        });
    }
    function getFFT(FFTdata2){

        d3.select("svg").remove();

        let newData = FFTdata2.split(' ');
        let len1 = newData.length;


        let data = [];
        let i = 0;

        for(i=0;i<len1;i++){
            data[i] = parseFloat(newData[i]);
        }


    var m = [80, 80, 80, 80]; // margins
    var w = 1300- m[1] - m[3]; // width
    var h = 500 - m[0] - m[2]; // height

    var x = d3.scale.linear().domain([0, data.length]).range([0, w]);

    var y = d3.scale.linear().domain([d3.min(data), d3.max(data)]).range([h, 0]);

    var x1 = d3.scale.ordinal().domain(["0","5","10","15","20","25","30"]).rangePoints([0, w]);

    var line = d3.svg.line()
    // assign the X function to plot our line as we wish
    .x(function(d,i) { return x(i); })
    .y(function(d) { return y(d); })

    var graph = d3.select("div#container_chart")
    .append("svg:svg")
    .attr("preserveAspectRatio", "xMinYMin meet")
    .attr("viewBox", "0 0 1300 500")
    .classed("svg-content", true)
    .append("svg:g")
    .attr("transform", "translate(" + m[3] + "," + m[0] + ")");

    graph.append("svg:text")      // text label for the x axis
    .attr("x", 560 )
    .attr("y", 405 )
    .style("text-anchor", "middle")
    .style("font-size","25px")
    .style("font-weight","bold")
    .text("頻率");


    // create yAxis
    var xAxis = d3.svg.axis().scale(x1).tickPadding(15).tickSize(-h).tickSubdivide(true);
    // Add the x-axis.
    graph.append("svg:g")
    .attr("class", "x axis")
    .attr("transform", "translate(-2," + h + ")")
    .call(xAxis)
    .style("font-size","20px")
    .select(".domain") 
    .remove();

    var yAxisLeft = d3.svg.axis().scale(y).ticks(6).orient("left");
    // Add the y-axis to the left
    graph.append("svg:g")
    .attr("class", "y axis")
    .style("font-size","18px")
    .attr("transform", "translate(-25,0)")
    .call(yAxisLeft);

    graph.append("svg:path").attr("d", line(data)).attr("stroke","#136bf7");
}

</script>
</body>

</html>

