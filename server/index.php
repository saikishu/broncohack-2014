<?php

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/timeline.css" />
        <link rel="stylesheet" type="text/css" href="css/timeline_light.css" />
        <script type="text/javascript" src="javascript/jquery.js"></script>
        <script type="text/javascript" src="javascript/timeline.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                var timeline_data = [
                    {
                        type:     'iframe',
                        date:     '2014-05-25',
                        title:    'Venue',
                        width:    400,
                        height:   300,
                        url:      'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3171.659971040939!2d-121.936734!3d37.350558!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fcbaf679c0c09%3A0xc9f380f64f80991c!2sBuck+Shaw+Stadium!5e0!3m2!1sen!2sus!4v1401046271222'
                    },
                    {
                        type:     'iframe',
                        date:     '2014-05-25',
                        title:    'Video',
                        width:    400,
                        height:   300,
                        url:      'https://www.youtube.com/watch?v=qyQuxFi8SbI'
                    },
                    {
                        type:     'blog_post',
                        date:     '2014-05-25',
                        title:    'Blog Post',
                        width:    400,
                        content:  '<b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
                        image:    'images/evra.jpg',
                        readmore: 'http://www.manutd.com'
                    }
                ];

                var timeline = new Timeline($('#timeline'), timeline_data);
                timeline.setOptions({
                    animation:   true,
                    lightbox:    true,
                    showMonth:   true,
                    allowDelete: false,
                    separator:   null,
                    columnMode:  'dual',
                    order:       'desc'
                });
                timeline.display();
            });
        </script>
    </head>
    <body>


        
        <div style="background:#000">
           <div class="timeline dual" style="width: 900px; ">
             <div class="column column_left">
                    <div id="header">
                        <div id="upcoming">
                        </div>
                    </div>
                 </div>
             <div class="column column_right">
                <div id="header">
                        <div id="upcoming-2">
                        </div>
                </div>
             </div>

           </div>
        </div>



        <div id="timeline"></div>
    </body>
</html>