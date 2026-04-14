protected function schedule(Schedule $schedule)
{
    $schedule->command('weather:check')->hourly(); // check kila saa
}
