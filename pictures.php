<?php
  
  function get_pic_list() {
    $pics = array();
    
    $pics_dir = "teampics";
    
    if ($handle = opendir("./".$pics_dir)) {
      while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
          $name = substr($entry, 0, -4);
          if (substr($entry, -3) == "jpg" || substr($entry, -3) == "gif") {
            $pics[$name]["loc"] = $pics_dir."/".$entry;
            $pics[$name]["desc"] = file_exists($pics_dir."/".$name.".txt");
            if ($pics[$name]["desc"]) {
              $tags = parse_ini_file($pics_dir."/".$name.".txt");
              foreach ($tags as $tag => $value) {
                $pics[$name][$tag] = $value;
              }
            }
          }
        }
      }
    } else {
      echo "No Pictures";
    }
    
    closedir($handle);
    
    ksort($pics);
    return $pics;
  }
  
  function get_start_pic($pics) {
    foreach ($pics as $name => $pic) {
    }
    return $name;
  }
  
  function get_newer_pic($pics, $act_file) {
    $found = 0;
    foreach ($pics as $name => $pic) {
      if ($found) {
        return $name;
      }
      if ($name == $act_file) {
        $found = 1;
      }
    }
    return "";
  }
  
  function get_older_pic($pics, $act_file) {
    $prev = "";
    foreach ($pics as $name => $pic) {
      
      if ($name == $act_file) {
        return $prev;
      }
      $prev = $name;
    }
  }
  
  function get_year_list($pics) {
    $yearlist = array();
    foreach ($pics as $name => $pic) {
      if ($pic["desc"]) {
        if (isset($yearlist[$pic["year"]])) {
          if ($name < $yearlist[$pic["year"]]) {
            $yearlist[$pic["year"]] = $name;
          }
        } else {
          $yearlist[$pic["year"]] = $name;
        }
      }
    }
    krsort($yearlist);
    return $yearlist;
  }
  
  function get_description($pic) {
    $desc = "";
    if ($pic["desc"]) {
      $desc .= "<b>";
      $desc .= add_if("",$pic["tournament"], " </b>in<b> ");
      $desc .= add_if("",$pic["location"], " ");
      $desc .= add_if("",$pic["day"], ".");
      $desc .= add_if("",$pic["month"], ".");
      $desc .= add_if("",$pic["year"], " ");
      $desc .= "</b><br/>";
      $desc .= add_if("",$pic["lineup"], "");
      
    } else {
      $desc = "";
    }
    return $desc;
  }
  
  function add_if($addPre, $text, $addon) {
    if ($text == "") {
      return "";
    } else {
      return $addPre.$text.$addon;
    }
  }
  
  ?>
