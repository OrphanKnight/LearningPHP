<?php include "header.php"; ?>

<style>
  @import url("https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap");
  @import url("https://fonts.googleapis.com/css2?family=Hind:wght@600&display=swap");
  body {
    background-color: #474e5d;
  }

  h1 {
    font-family: "Share Tech Mono", monospace;
    font-size: 50px;
    color: aliceblue;
  }

  li {
    font-size: 25px;
    color: azure;
  }

  b {
    font-family: "Hind", sans-serif;
  }
</style>

<?php
$interests = [ 
'3D Printing Workshops' => 'Attend workshops, webinars, or
conferences focused on 3D printing technology. This can also include meeting
local 3D printing enthusiasts or joining online 3D printing communities', 

'Art Exhibitions and Workshops' => 'Visit art museums or galleries showcasing digital
art, or take part in digital art workshops where you can learn and create your
own pieces', 

'Music Festivals/Concerts' => 'Attend classical and hip hop music
festivals or concerts. Also, consider exploring the intersection of music and
technology through music coding or digital music production', 

'Astronomy Nights'=>'Spend a night stargazing and maybe consider building your own
telescope or using apps that can help identify stars, constellations, and
planets', 

'DIY Projects' => 'Combine your interest in programming, 3D printing,
and music to come up with DIY projects. This could be creating 3D printed
instruments or using coding to create a unique piece of interactive art', 
    
'Game Development' => 'Try your hand at developing a small video game, incorporating
elements of your interests. This could be a 3D-printed game controller or a game
with classical or hip hop music themes', 

'Podcasts and Ted Talks' => 'Listen to
podcasts or watch TED Talks related to your interests: programming, 3D printing,
art, music, and adventuring'];

$keys = ['3D Printing Workshops', 'Art Exhibitions and Workshops', 'Music Festivals/Concerts', 'Astronomy Nights', 'DIY Projects', 'Game Development', 'Podcasts and Ted Talks'];

echo "<h1>Interests</h1>";

foreach ($interests as $keys => $interests){
    echo
    " 
    <ul>
        <li>
        <p><b>$keys:</b> $interests<p>
        </li>
    </ul>
    ";
}
?>

<?php include "footer.php"; ?>
