<?php
/*
 * index.php
 *
 * index of the dashboard
 *
 * @category        Springbok
 * @package         SpringbokBundle
 * @subpackage      View
 */

?>
<div id="dashboard">
  
  <h2>Dashboard</h2>
  <p>
    Overview of all kinds of stuff \o/
  </p>
  
  <div id="queue">
    <h2>Queue</h2>
    <?php $view->actions->output('TicketBundle:Ticket:queue'); ?>
  </div>

  <div id="projects">
    <h2>Projects</h2>
    <?php $view->actions->output('ProjectBundle:Project:index'); ?>
  </div>

</div>

<?php

$view->extend('SpringbokBundle::layout');
//we are using the main layout

?>