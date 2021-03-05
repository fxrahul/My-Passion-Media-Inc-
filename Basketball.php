<?php
/*
    The idea of this algorithm is based on Dynamic Programming bottom up approach.
    We maintain nearyly equal skills while distributing the players to two teams.
    Algorithm:
        1. Sort in descending order.
        2. Assign smallest and biggest pointers.
        3. Initial team skills to 0.
        3. In each turn, if skill of team 1 is less than or equal to team 2 then team 1 is allowed to pick one player with high skill or else,
           team1 should pick one player with low skill and similarly for team 2 while picking.
        4. Add skills to respective team skils.
        5. Increment or decrement smallest and biggest pointer according to step 3.

*/
$skills = array(8,5,6,9,3,8,2,4,6,10,8,5,6,1,7,10,5,3,7,6);
rsort($skills);
$biggest = 0;
$smallest = count($skills) - 1;
$team1Skills = 0;
$team2Skills = 0;
$team1 = array();
$team2 = array();
$length = count($skills);
for($x = 0 ; $x < $length ; $x++){
    if($x % 2 == 0){//team 1 turn to pick..
        if($team1Skills <= $team2Skills){
            $team1Skills += $skills[$biggest];
            $biggest++;
            array_push($team1, $skills[$biggest]);
        }else{
            $team1Skills += $skills[$smallest];
            $smallest--;
            array_push($team1,$skills[$smallest]);
        }
    }else{ //team 2 turn to pick
        if($team2Skills <= $team1Skills){
            $team2Skills += $skills[$biggest];
            $biggest++;
            array_push($team2,$skills[$biggest]);
        }else{
            $team2Skills += $skills[$smallest];
            $smallest--;
            array_push($team2,$skills[$smallest]);
        }
    }
}
echo "Team 1 Total Skills: " . $team1Skills . '<br/>';
echo "Team 2 Total Skills: " .$team2Skills . '<br/>';
echo '<br/>';
echo 'Team 1: ';
foreach($team1 as $y){
    echo $y . '&nbsp;';
}
echo '<br/>';
echo 'Team 2    : ';
foreach($team2 as $y){
    echo $y . '&nbsp;';
}
?>