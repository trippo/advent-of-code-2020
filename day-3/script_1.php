<?php
$list = '..##.......
#...#...#..
.#....#..#.
..#.#...#.#
.#...##..#.
..#.##.....
.#.#.#....#
.#........#
#.##...#...
#...##....#
.#..#...#.#';

// digest the list as array
$list_array = explode("\n", $list);

// starting parameters
$move_right = 3;
$move_down  = 1;
$pos_x      = 0;
$nb_lines   = count($list_array);
$line_len   = strlen($list_array[0]);
$nb_trees   = 0;

// traverse the map
for( $pos_y = 0; $pos_y < $nb_lines; $pos_y += $move_down  )
{
    // check if we need to repeat the pattern
    $repeat = floor( $pos_x / $line_len ) + 1;
    
    $line = '';
    for( $i = 0; $i <= $repeat; $i++ )
    {
        $line .= preg_replace( "/\r|\n/", "", $list_array[$pos_y] );
    }
    
    // check for trees
    if( substr($line,$pos_x,1) == '#' )
    {
        $char = 'X';
        $nb_trees++;
    } else {
        $char = 'O';
    }
    
    // display output
    echo substr($line,0,$pos_x);
    echo $char;
    echo substr($line,$pos_x+1)."\n";
    
    // move the X position
    $pos_x += $move_right;
    
}

// Return result
echo "\nNumber of trees: ".$nb_trees;
?>
