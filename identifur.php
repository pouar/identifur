<?php
/* This requires php-xxhash to use
https://github.com/Megasaxon/php-xxhash
*/
header('Content-Type: image/svg+xml');
if(!isset($_GET["value"]))
{
	header('Content-Type: text/plain');
	exit("GET variable 'value' must be set");
}
$hash = hexdec(xxhash32( $_GET["value"] ));
$height=1024.0;
if(empty($_GET["height"])
{
	$newheight=1024.0;
}
else if (!is_numeric($_GET["height"])
{
	header('Content-Type: text/plain');
	exit("GET variable 'height' must be numeric");
}
else
{ 
	$newheight= (float)$_GET["height"];
}
$rgb1=sprintf("%03x",(($hash >> 20) & 0xfff));
$rgb2=sprintf("%03x",(($hash >> 8) & 0xfff));
$tail=dechex(($hash >> 6) & 0b11);
$ears=dechex(($hash >> 4) & 0b11);
$wings=dechex(($hash >> 2) & 0b11);
$clothes=dechex($hash & 0b11);
$tailpaths[0]=<<<EOT
<path d="m125.67708 169.622c-21.68755-17.39448-45.257138-13.91836-62.744046 4.91369 15.179415 27.56736 46.724746 15.03834 62.589456 6.11444z" fill="#{$rgb1}" fill-rule="evenodd" stroke="#{$rgb1}" stroke-width=".26458332"/>
EOT;
$tailpaths[1]=<<<EOT
<path d="m125.61668 171.65057c-26.718795-29.00078-23.54506 21.16167-62.140167 4.27631-3.430963-1.39964-2.805857-4.61979-.000001-4.00904 38.595108 16.88536 35.421371-33.27709 62.140168-4.27631z" fill="#{$rgb1}" fill-rule="evenodd" stroke="#{$rgb1}" stroke-width=".26458332"/>
EOT;
$tailpaths[2]=<<<EOT
<path d="m125.67708 171.41739c-17.74251 1.51569-32.948177-5.62655-45.168154-15.40253-.233031 18.25409 30.437824 31.11928 44.979174 24.75744z" fill="#{$rgb1}" fill-rule="evenodd" stroke="#{$rgb1}" stroke-width=".26458332"/>
EOT;
$tailpaths[3]=<<<EOT
<path d="m125.62984 172.55132c-3.17708.2876-4.1389-1.93204-5.6224-3.68527-2.85832 4.69842.3132 11.68881 5.57515 8.88244z" fill="#{$rgb1}" fill-rule="evenodd" stroke="#{$rgb1}" stroke-width=".26458332"/>
EOT;
$earspaths[0]=<<<EOT
<path d="m145.51059 13.600796-9.33541 17.047264-9.74129-15.626659-7.91481 26.179729 34.90631-6.088308z" fill="#{$rgb1}" fill-rule="evenodd" stroke="#{$rgb1}" stroke-width=".26458332" transform="translate(0 26.066647)"/>
EOT;
$earspaths[1]=<<<EOT
<path d="m119.5338 70.830902c-5.27653-62.8472713 14.09057-98.750119 16.84433-17.047265 2.11952-81.636676 24.68057-45.8304649 17.04726 10.14718z" fill="#{$rgb1}" fill-rule="evenodd" stroke="#{$rgb1}" stroke-width=".26458332"/>
EOT;
$earspaths[2]=<<<EOT
<path d="m156.06366 30.445117c-10.25115 1.708526-13.92085 12.295042-17.72694 21.646406-1.77671-11.429518-7.26813-16.569113-17.65085-21.094914-11.76816 9.7164-8.69162 28.242086-3.15706 39.893784l38.73779-1.074211c8.78134-7.958094 8.51072-30.22741-.20294-39.371065z" fill="#{$rgb1}" fill-rule="evenodd" stroke="#{$rgb1}" stroke-width=".26458332"/>
EOT;
$earspaths[3]=<<<EOT
<path d="m445.83008 120.40625a61.83051 61.83051 0 0 0 -61.83008 61.83008 61.83051 61.83051 0 0 0  61.83008 61.83203 61.83051 61.83051 0 0 0  61.83008-61.83203 61.83051 61.83051 0 0 0 -61.83008-61.83008zm138.1582 0a61.83051 61.83051 0 0 0 -61.83008 61.83008 61.83051 61.83051 0 0 0  61.83008 61.83203 61.83051 61.83051 0 0 0  61.83008-61.83203 61.83051 61.83051 0 0 0 -61.83008-61.83008z" fill="#{$rgb1}" fill-rule="evenodd" stroke="#{$rgb1}" stroke-linecap="round" stroke-linejoin="round" transform="scale(.26458333)"/>
EOT;
$wingspaths[0]=<<<EOT
<path d="m148.92262 122.56397c15.01005.97976 25.44381-6.88255 35.71875-12.66221 11.41883 18.83944 12.04149 40.39089 15.68601 61.04316-15.96363-7.99737-32.85384-10.1955-55.5625-9.07143-3.38195-1.0496-10.20772.32874-11.33928.56697-17.49806-1.14881-32.39229-1.10749-59.531257 13.79613 8.309983-20.18139 9.128535-43.81272 17.575895-64.82292 11.312542 3.9279 25.443262 8.57403 36.096722 9.82738 7.15392.9512 14.35418.91106 21.35566 1.32292z" fill="#{$rgb1}" fill-rule="evenodd" stroke="#{$rgb1}" stroke-width=".26458332"/>
EOT;
$wingspaths[1]=<<<EOT
<path d="m211.28868 158.4717c.81242 2.77567 1.81804 5.94914 3.03429 8.66103 14.2462 29.36584-14.53365-3.29272-18.15333-14.70864 1.00961 2.62648 1.78004 5.68864 3.07916 8.15039 14.14623 32.98047-15.67492.58916-20.46607-13.44206.34558 1.99598 1.67584 3.99327 2.2125 6.12491 14.14218 30.68741-15.08563 2.07802-20.54434-11.22759.50388 1.71204 1.88017 3.89557 2.45684 5.10268 10.85392 23.69729-13.89218.31503-16.81994-8.69345-5.5529-.26443-10.83675 1.87028-17.00892 0-2.92776 9.00848-27.54646 29.45078-16.81994 8.69345.5748-1.07589 1.49265-3.21334 2.45684-5.10268-5.45871 13.30561-32.487788 43.45834-20.878435 12.26326.530712-1.91152 1.661229-4.86025 2.54659-7.16058-4.791148 14.03123-35.162904 44.42652-20.666518 14.07683.892905-2.47462 2.546371-5.75223 3.279616-8.78516-3.619682 11.41592-28.359727 40.75932-17.942405 15.4713.762213-2.96567 2.040167-6.12201 2.823357-9.42369-4.060203 10.0797-27.621923 35.19245-21.355653 19.65477 34.184656-85.461643 2.685172-86.414677 83.910708-56.88542 3.44829 1.17048 8.51435 1.96644 11.1503 2.45685 2.63595-.49041 7.70201-1.28637 11.1503-2.45685 81.22554-29.529258 49.72605-28.576224 83.91071 56.88542 7.96716 21.4908-17.95691-9.19709-21.35566-19.65477z" fill="#{$rgb1}" fill-rule="evenodd" stroke="#{$rgb1}" stroke-width=".26458332"/>
EOT;
$wingspaths[2]=<<<EOT
<path d="m147.50202 118.09921c15.01005.97976 26.05264-11.14437 36.32758-16.92403 11.41883 18.83944 22.59455 136.18029 26.23907 156.83256-9.46943-21.59459-42.59513-97.25832-65.30379-96.13425-3.38195-1.0496-10.20772.32874-11.33928.56697-17.49806-1.14881-60.601455 59.7756-80.231508 92.33532 8.309983-20.18139 29.017011-131.07849 37.464371-152.08869 11.312547 3.9279 24.834437 12.83585 35.487897 14.0892 7.15392.9512 14.35418.91106 21.35566 1.32292z" fill="#{$rgb1}" fill-rule="evenodd" stroke="#{$rgb1}" stroke-width=".26458332" transform="translate(-.00012419791 -.000074)"/>
EOT;
$wingspaths[3]=<<<EOT

EOT;
$clothespaths[0]=<<<EOT
<path d="m152.11299 122.83842c1.13693 3.56377 2.6362 8.3999 3.36846 10.91559 3.74885 0 9.67154-2.26093 13.22265-2.8238-2.31649-8.30192-6.76465-18.16248-16.3041-27.03417-8.28884 5.0654-18.80377 7.93567-27.55255-.287-9.74982 5.08339-16.96554 20.96792-19.68151 27.9198 3.90273 1.55682 10.71877 4.41872 14.5664 4.93009 1.69519-7.89705 5.11336-11.65862 5.48389-12.86268.0992 40.75999-.97568 85.78272-4.26182 128.56479 4.23032.3096 8.42996.50996 12.5825.60883 1.05392-22.70149 4.76918-48.08613 4.76918-70.31997 1.59576 22.3837.6333 48.9171 3.14563 70.52292 4.03453-.53815 9.37406-.64933 12.78545-.81178-.0503-25.27001-2.51612-95.60964-2.12418-129.32262z" fill="#{$rgb2}" fill-rule="evenodd" stroke="#{$rgb2}" stroke-width=".26458332"/>
EOT;
$clothespaths[1]=<<<EOT
<path d="m471.86523 391.59375c-36.84971 19.21281-64.12163 79.24861-74.38671 105.52344 14.75047 5.88404 40.51051 16.70007 55.05273 18.63281 6.40702-29.84712 19.32613-44.06446 20.72656-48.61523.13344 54.82647-.3092 111.71392-1.47656 169.51367h104.7207c-1.28301-65.59488-2.1067-127.58323-1.58593-172.37696 4.29705 13.46937 9.96287 31.74774 12.73046 41.25586 14.16889 0 36.5531-8.54644 49.97461-10.67382-8.75523-31.37734-25.56647-68.64499-61.62109-102.17579-31.3279 19.14482-71.06851 29.99383-104.13477-1.08398z" fill="#{$rgb2}" fill-rule="evenodd" stroke="#{$rgb2}" transform="scale(.26458333)"/>
EOT;
$clothespaths[2]=<<<EOT
<path d="m159.96584 210.77731-7.43303-42.33074c-.33947-17.35532-.5574-33.7564-.41961-45.60808 1.13692 3.56377 2.636 8.39993 3.36826 10.91562 3.74885 0 9.67134-2.26125 13.22245-2.82412-2.31649-8.30192-6.76446-18.16232-16.30391-27.03401-8.28884 5.0654-18.80354 7.93587-27.55233-.2868-9.74982 5.08339-16.96551 20.96786-19.68148 27.91974 3.90273 1.55682 10.71841 4.41856 14.56604 4.92993 1.69519-7.89705 5.11337-11.65872 5.4839-12.86278.0353 14.50617-.0818 29.55764-.39068 44.8505l-10.48659 41.95676z" fill="#{$rgb2}" fill-rule="evenodd" stroke="#{$rgb2}" stroke-width=".26458332"/>
EOT;
$clothespaths[3]=<<<EOT
<ellipse cx="138.94554" cy="142.06779" rx="9.4711866" ry="35.588699" style="fill:#{$rgb2};fill-rule:evenodd;stroke:#{$rgb2};stroke-width:.26458332;stroke-linecap:round;stroke-linejoin:round"/>
EOT;
?>
<svg height="<?=$newheight?>" viewBox="0 0 <?=($newheight/$height)*270.93332?> <?=($newheight/$height)*270.93333?>" width="<?=$newheight?>" xmlns="http://www.w3.org/2000/svg"><g transform="scale(<?=$newheight/$height?>)"><path d="m152.70238 255.80057c0-17.49275-.12376-38.00529-.94494-56.88541l-.37798-79.94197c7.41547 15.75787 11.47429 41.01272 10.01638 60.85417-17.95412 22.3661 25.63499 22.04668 8.50446-.37798 1.40223-23.83796 3.22829-60.65704-19.27679-75.02827 33.92127-74.018903-63.707008-65.809102-24.00148-.18898-27.439166 17.11042-23.76545 53.52913-21.16667 76.91815-17.954113 22.3661 25.63499 22.04668 8.50446-.37798-.95935-22.26051.69097-45.92113 12.28423-63.31101l-.94495 80.8869c-1.76616 19.46044-1.7497 39.72441-3.96874 58.58631-.95398-.0561-13.79138 1.89464-8.59896 7.08706 2.54672 2.54671 19.49961 2.95614 21.26116-.56697 1.35441-2.70882-.21854-5.74984-2.26785-6.70908l5.10267-75.78422c0-1.9377 3.90195-2.5276 3.96875-.18899l1.5119 74.83928c-2.04931.95924-3.62226 4.00026-2.26785 6.70908 1.76155 3.52311 18.71444 3.11368 21.26116.56697 5.19242-5.19242-7.64498-7.14318-8.59896-7.08706" fill="#<?=$rgb1?>" fill-rule="evenodd" stroke="#<?=$rgb1?>" stroke-width=".26458332"/>
<?=$tailpaths[$tail] ?>
<?=$earspaths[$ears] ?>
<?=$wingspaths[$wings] ?>
<?=$clothespaths[$clothes] ?>
</g>
</svg>
