<?php
function format_rupiah($angka)
{
  $rupiah = number_format($angka, 0, ',', '.');
  return $rupiah;
}

function day_to_hari($day)
{
  switch ($day) {
    case 'Monday':
      return 'Senin';
      break;
    case 'Tuesday':
      return 'Selasa';
      break;
    case 'Wednesday':
      return 'Rabu';
      break;
    case 'Thursday':
      return 'Kamis';
      break;
    case 'Friday':
      return 'Jumat';
      break;
    case 'Saturday':
      return 'Sabtu';
      break;
    case 'Sunday':
      return 'Minggu';
      break;
    default:
      return '-';
      break;
  }
}

function month_to_bulan($month)
{
    switch ($month) {
        case 'January':
            return 'Januari';
            break;
        case 'February':
            return 'Februari';
            break;
        case 'March':
            return 'Maret';
            break;
        case 'April':
            return 'April';
            break;
        case 'May':
            return 'Mei';
            break;
        case 'June':
            return 'Juni';
            break;
        case 'July':
            return 'Juli';
            break;
        case 'August':
            return 'Agustus';
            break;
        case 'September':
            return 'September';
            break;
        case 'October':
            return 'Oktober';
            break;
        case 'November':
            return 'November';
            break;
        case 'December':
            return 'Desember';
            break;
        default:
            return '-';
            break;
    }
}

function changeTimeZone($dateString, $timeZoneSource = null, $timeZoneTarget = null)
{
  if (empty($timeZoneSource)) {
    $timeZoneSource = date_default_timezone_get();
  }
  if (empty($timeZoneTarget)) {
    $timeZoneTarget = date_default_timezone_get();
  }

  $dt = new DateTime($dateString, new DateTimeZone($timeZoneSource));
  $dt->setTimezone(new DateTimeZone($timeZoneTarget));

  return $dt->format("Y-m-d H:i:s");
}
