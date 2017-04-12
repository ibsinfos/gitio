<?php
include 'classes/calendar.php';
 
$month = isset($_GET['m']) ? $_GET['m'] : NULL;
$year  = isset($_GET['y']) ? $_GET['y'] : NULL;
 
$calendar = Calendar::factory($month, $year);
 
$event1 = $calendar->event()
    ->condition('timestamp', strtotime(date('F').' 21, '.date('Y')))
    ->title('Hello All')
    ->output('<a href="http://google.com">Going to Google</a>');
     
$event2 = $calendar->event()
    ->condition('timestamp', strtotime(date('F').' 21, '.date('Y')))
    ->title('Something Awesome')
    ->output('<a href="http://coreyworrell.com">My Portfolio</a><br />It\'s pretty cool in there.');
 
$calendar->standard('today')
    ->standard('prev-next')
    ->standard('holidays')
    ->attach($event1)
    ->attach($event2);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>PHP Calendar</title>
		<link type="text/css" rel="stylesheet" media="all" href="css/style.css" />
	</head>
	<body>
		<table class="calendar small">
    <thead>
        <tr class="navigation">
            <th class="prev-month"><a href="<?php echo htmlspecialchars($calendar->prev_month_url()) ?>"><?php echo $calendar->prev_month(0, '&laquo;') ?></a></th>
            <th colspan="5" class="current-month"><?php echo $calendar->month() ?> <?php echo $calendar->year ?></th>
            <th class="next-month"><a href="<?php echo htmlspecialchars($calendar->next_month_url()) ?>"><?php echo $calendar->next_month(0, '&raquo;') ?></a></th>
        </tr>
        <tr class="weekdays">
            <?php foreach ($calendar->days(1) as $day): ?>
                <th><?php echo $day ?></th>
            <?php endforeach ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($calendar->weeks() as $week): ?>
            <tr>
                <?php foreach ($week as $day): ?>
                    <?php
                    list($number, $current, $data) = $day;
                     
                    $classes = array();
                    $output  = '';
                     
                    if (is_array($data))
                    {
                        $classes = $data['classes'];
                        $title   = $data['title'];
                        $output  = empty($data['output']) ? '' : '<ul class="output"><li>'.implode('</li><li>', $data['output']).'</li></ul>';
                    }
                    ?>
                    <td class="day <?php echo implode(' ', $classes) ?>">
                        <span class="date" title="<?php echo implode(' / ', $title) ?>">
                            <?php if ( ! empty($output)): ?>
                                <a href="#" class="view-events"><?php echo $number ?></a>
                            <?php else: ?>
                                <?php echo $number ?>
                            <?php endif ?>
                        </span>
                    </td>
                <?php endforeach ?>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
	</body>
</html>