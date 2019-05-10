<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="js/pcm-player.min.js"></script>
    <script src="https://cdn.webrtc-experiment.com/RecordRTC.js"></script>
    <script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
</head>
<body>
    <button id='s'>start</button>
    <button id='p'>pause</button>
</body>
<script>

    const constraints = {
        sampleSize:16,
        channelCount:1,
        sampleRate:1024
    };
    let timer;
    let chunks = [];
    let finalChunks = [];
    let count = 0;
    let theData = 0;

    let audioInput = null;
    let microphone_stream;
    let gain_node = null;
    let script_processor_node;

    $('#s').click(function(){

        window.AudioContext = window.AudioContext || window.webkitAudioContext;



        if (!navigator.mediaDevices.getUserMedia){
            navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
        }

        if(navigator.mediaDevices.getUserMedia)
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
        }
    }


}


        // --- setup FFT

        /*script_processor_analysis_node = context.createScriptProcessor(constraints);



        analyser_node = context.createAnalyser();
        analyser_node.smoothingTimeConstant = 0;
        analyser_node.fftSize = 2048;

        microphone_stream.connect(analyser_node);

        analyser_node.connect(script_processor_analysis_node);

        var buffer_length = analyser_node.frequencyBinCount;

        var array_freq_domain = new Float32Array(buffer_length);
        var array_time_domain = new Float32Array(buffer_length);

        console.log("buffer_length " + buffer_length);

        script_processor_analysis_node.onaudioprocess = function(){

            // get the average for the first channel
            analyser_node.getFloatFrequencyData(array_freq_domain);
            analyser_node.getFloatTimeDomainData(array_time_domain);

            // draw the spectrogram
            if (microphone_stream.playbackState == microphone_stream.PLAYING_STATE)
            {
                console.log('freq' + array_freq_domain);
            }
        };*/
    


</script>
</html>