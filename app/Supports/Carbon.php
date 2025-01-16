<?php

namespace App\Supports;

use Illuminate\Support\Facades\Config;

final class Carbon extends \Carbon\Carbon
{
    /**
     * Get the date in Y-m-d format.
     *
     * @return string
     */
    public function getDate()
    {
        return $this->format('j F Y');
    }

    /**
     * Get the time in H:i format.
     */
    public function getTime()
    {
        return $this->format('H:i');
    }

    /**
     * Get the date in a human-readable format.
     *
     * @return string
     */
    public function getDateHuman()
    {
        return $this->diffForHumans();
    }

    /**
     * Get the date in an informative format.
     *
     * @return string
     */
    public function getDateInformative()
    {
        return $this->format('l, F j, Y');
    }

    /**
     * Get the date and time in an informative format with hour and minute.
     *
     * @return string
     */
    public function getDateTimeInformative()
    {
        return $this->format('l, F j, Y H:i');
    }

    /**
     * Get the date with timezone.
     *
     * @param string|null $timezone
     * @return string
     */
    public function getDateWithTimezone($timezone = null)
    {
        $timezone = $timezone ?? Config::get('app.timezone');
        return $this->setTimezone($timezone)->format('j F Y');
    }

    /**
     * Get the date and time with timezone.
     *
     * @param string|null $timezone
     * @return string
     */
    public function getDateTimeWithTimezone($timezone = null)
    {
        $timezone = $timezone ?? Config::get('app.timezone');
        return $this->setTimezone($timezone)->format('j F Y H:i T');
    }

    /**
     * Get the date in an informative format with timezone.
     *
     * @param string|null $timezone
     * @return string
     */
    public function getDateInformativeWithTimezone($timezone = null)
    {
        $timezone = $timezone ?? Config::get('app.timezone');
        return $this->setTimezone($timezone)->format('l, F j, Y T');
    }

    /**
     * Get the date and time in an informative format with timezone.
     *
     * @param string|null $timezone
     * @return string
     */
    public function getDateTimeInformativeWithTimezone($timezone = null)
    {
        $timezone = $timezone ?? Config::get('app.timezone');
        return $this->setTimezone($timezone)->format('l, F j, Y H:i T');
    }
}
