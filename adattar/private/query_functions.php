<?php

//dokumentumok

  function find_all_documents($options=[]) {
    global $db;

    $visible = $options['visible'] ?? false;
    $sql = "SELECT * FROM dokumentum ";
    if($visible) {
      $sql .= "WHERE visible = true ";
    }
    $sql .= "ORDER BY id DESC ";
    $sql .= "LIMIT 10";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }
  function find_document_by_leltari_szam($leltari_szam) {
    global $db;

    $sql = "select a.*, group_concat(distinct concat(' ',b.nev)), ";
    $sql .= "group_concat(distinct concat(' ',e.name)), ";
    $sql .= "group_concat(distinct concat(' ',g.name)) ";
    $sql .= "from dokumentum a ";
    $sql .= "left join dok_ceg c ";
    $sql .= "inner join ceg b on c.ceg_id = b.id ";
    $sql .= "on a.id = c.dok_id ";
    $sql .= "left join dok_taj d ";
    $sql .= "inner join taj e on e.code = d.tajkod ";
    $sql .= "on a.id = d.dok_id ";
    $sql .= "left join dok_eto f ";
    $sql .= "inner join eto g on g.code = f.eto_kod ";
    $sql .= "on a.id = f.dok_id ";
    $sql .= "where a.leltari_szam1 ='" . db_escape($db, $leltari_szam) . "'";

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $document = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $document;

  }

  function find_document_by_id($id, $options=[]) {
    global $db;

    $visible = $options['visible'] ?? false;

    $sql = "SELECT * FROM dokumentum ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    if($visible) {
      $sql .= "AND visible = true";
    }
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $document = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $document;
  }
  function validate_document($document) {
    $errors = [];
    if (is_blank($document['leltari_szam1'])) {
      $errors[] = "A leltári szám 1 mező nem lehet üresen.";
    }
    if(is_blank($document['cim'])) {
      $errors[] = "A cím mező nem lehet üres.";
    } elseif(!has_length($document['cim'], ['min' => 2, 'max' => 255])) {
      $errors[] = "A cím hossza legalább 2 karakter és maximum 255 hosszú lehet.";
    }

    $postion_int = (int) $document['ev'];

    if($postion_int <= 0) {
      $errors[] = "Az év nem lehet kisebb mint 0.";
    }
    if($postion_int > 2100) {
      $errors[] = "az év nem lehet nagyobb mint 2100.";
    }
    if(is_blank($document['adattar'])) {
      $errors[] = "Az adattár mező nem lehet üres";
    }
    return $errors;
  }
  function insert_document($document) {
    global $db;

    $errors = validate_document($document);
    if(!empty($errors)) {
      return $errors;
    }
    $sql = "INSERT INTO dokumentum ";
    $sql .= "(leltari_szam1, leltari_szam2, ";
    $sql .= "szerzo, cim, ev, szoveg, terkep, szelveny, ";
    $sql .= "tablazat, abra, foto, melleklet, retegsor, ";
    $sql .= "diagram, vizsgalat, adattar, letrehozta, hozzaadva) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $document['leltari_szam1']) . "',";
    $sql .= "'" . db_escape($db, $document['leltari_szam2']) . "',";
    $sql .= "'" . db_escape($db, $document['szerzo']) . "',";
    $sql .= "'" . db_escape($db, $document['cim']) . "',";
    $sql .= "'" . db_escape($db, $document['ev']) . "',";
    $sql .= "'" . db_escape($db, $document['szoveg']) . "',";
    $sql .= "'" . db_escape($db, $document['terkep']) . "',";
    $sql .= "'" . db_escape($db, $document['szelveny']) . "',";
    $sql .= "'" . db_escape($db, $document['tablazat']) . "',";
    $sql .= "'" . db_escape($db, $document['abra']) . "',";
    $sql .= "'" . db_escape($db, $document['foto']) . "',";
    $sql .= "'" . db_escape($db, $document['melleklet']) . "',";
    $sql .= "'" . db_escape($db, $document['retegsor']) . "',";
    $sql .= "'" . db_escape($db, $document['diagram']) . "',";
    $sql .= "'" . db_escape($db, $document['vizsgalat']) . "',";
    $sql .= "'" . db_escape($db, $document['adattar']) . "',";
    $sql .= "'" . db_escape($db, $document['letrehozta']) . "',";
    $sql .= "'" . db_escape($db, $document['hozzaadva']) . "'";
    $sql .= ")";

    $result = mysqli_query($db, $sql);

    if($result) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }
  function update_document($document) {
    global $db;

    $errors = validate_document($document);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "UPDATE dokumentum SET ";
    $sql .= "leltari_szam1='" . db_escape($db, $document['leltari_szam1']) . "', ";
    $sql .= "leltari_szam2='" . db_escape($db, $document['leltari_szam2']) . "', ";
    $sql .= "szerzo='" . db_escape($db, $document['szerzo']) . "',";
    $sql .= "cim='" . db_escape($db, $document['cim']) . "',";
    $sql .= "ev='" . db_escape($db, $document['ev']) . "',";
    $sql .= "szoveg='" . db_escape($db, $document['szoveg']) . "',";
    $sql .= "terkep='" . db_escape($db, $document['terkep']) . "',";
    $sql .= "szelveny='" . db_escape($db, $document['szelveny']) . "',";
    $sql .= "tablazat='" . db_escape($db, $document['tablazat']) . "',";
    $sql .= "abra='" . db_escape($db, $document['abra']) . "',";
    $sql .= "foto='" . db_escape($db, $document['foto']) . "',";
    $sql .= "melleklet='" . db_escape($db, $document['melleklet']) . "',";
    $sql .= "retegsor='" . db_escape($db, $document['retegsor']) . "',";
    $sql .= "diagram='" . db_escape($db, $document['diagram']) . "',";
    $sql .= "vizsgalat='" . db_escape($db, $document['vizsgalat']) . "',";
    $sql .= "adattar='" . db_escape($db, $document['adattar']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $document['id']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    if($result) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }
  function delete_document($id) {
    global $db;

    $sql = "DELETE FROM documents ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    if($result) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

//admins

  function find_all_admins() {
    global $db;

    $sql = "SELECT * FROM admins ";
    $sql .= "ORDER BY first_name DESC, last_name DESC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_admin_by_id($id) {
    global $db;

    $sql = "SELECT * FROM admins ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $admin = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $admin;
  }

  function validate_admin($admin) {

    if(is_blank($admin['first_name'])) {
      $errors[] = "First name cannot be blank.";
    } elseif (!has_length($admin['first_name'], array('min' => 2, 'max' => 255))) {
      $errors[] = "First name must be between 2 and 255 characters.";
    }

    if(is_blank($admin['last_name'])) {
      $errors[] = "Last name cannot be blank.";
    } elseif (!has_length($admin['last_name'], array('min' => 2, 'max' => 255))) {
      $errors[] = "Last name must be between 2 and 255 characters.";
    }

    if(is_blank($admin['email'])) {
      $errors[] = "Email cannot be blank.";
    } elseif (!has_length($admin['email'], array('max' => 255))) {
      $errors[] = "Last name must be less than 255 characters.";
    } elseif (!has_valid_email_format($admin['email'])) {
      $errors[] = "Email must be a valid format.";
    }

    if(is_blank($admin['username'])) {
      $errors[] = "Username cannot be blank.";
    } elseif (!has_length($admin['username'], array('min' => 4, 'max' => 255))) {
      $errors[] = "Username must be between 4 and 255 characters.";
    } elseif (!has_unique_username($admin['username'], $admin['id'] ?? 0)) {
      $errors[] = "Username not allowed. Try another.";
    }

    if(is_blank($admin['password'])) {
      $errors[] = "Password cannot be blank.";
    } elseif (!has_length($admin['password'], array('min' => 12))) {
      $errors[] = "Password must contain 12 or more characters";
    } elseif (!preg_match('/[A-Z]/', $admin['password'])) {
      $errors[] = "Password must contain at least 1 uppercase letter";
    } elseif (!preg_match('/[a-z]/', $admin['password'])) {
      $errors[] = "Password must contain at least 1 lowercase letter";
    } elseif (!preg_match('/[0-9]/', $admin['password'])) {
      $errors[] = "Password must contain at least 1 number";
    } elseif (!preg_match('/[^A-Za-z0-9\s]/', $admin['password'])) {
      $errors[] = "Password must contain at least 1 symbol";
    }

    if(is_blank($admin['confirm_password'])) {
      $errors[] = "Confirm password cannot be blank.";
    } elseif ($admin['password'] !== $admin['confirm_password']) {
      $errors[] = "Password and confirm password must match.";
    }
    return $errors;
  }
  function insert_admin($admin) {
    global $db;

    $errors = validate_admin($admin);
    if (!empty($errors)) {
      return $errors;
    }

    $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO admins ";
    $sql .= "(first_name, last_name, email, username, hashed_password) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $admin['first_name']) . "',";
    $sql .= "'" . db_escape($db, $admin['last_name']) . "',";
    $sql .= "'" . db_escape($db, $admin['email']) . "',";
    $sql .= "'" . db_escape($db, $admin['username']) . "',";
    $sql .= "'" . db_escape($db, $hashed_password) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);

    if($result) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_admin($admin) {
    global $db;

    $errors = validate_admin($admin);
    if (!empty($errors)) {
      return $errors;
    }

    $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

    $sql = "UPDATE admins SET ";
    $sql .= "first_name='" . db_escape($db, $admin['first_name']) . "', ";
    $sql .= "last_name='" . db_escape($db, $admin['last_name']) . "', ";
    $sql .= "email='" . db_escape($db, $admin['email']) . "', ";
    $sql .= "hashed_password='" . db_escape($db, $hashed_password) . "',";
    $sql .= "username='" . db_escape($db, $admin['username']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $admin['id']) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    if($result) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function delete_admin($admin) {
    global $db;



    $sql = "DELETE FROM admins ";
    $sql .= "WHERE id='" . db_escape($db, $admin['id']) . "' ";
    $sql .= "LIMIT 1;";
    $result = mysqli_query($db, $sql);

  if($result) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }
  function find_admin_by_username($username) {
    global $db;



    $sql = "SELECT * FROM admins ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $admin = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $admin;
}

//users

    function insert_users($user) {
      global $db;

      $errors = validate_users($user);
      if (!empty($errors)) {
        return $errors;
      }

      $hashed_password = password_hash($user['password'], PASSWORD_BCRYPT);

      $sql = "INSERT INTO users ";
      $sql .= "(first_name, last_name, email, username, hashed_password) ";
      $sql .= "VALUES (";
      $sql .= "'" . db_escape($db, $user['first_name']) . "',";
      $sql .= "'" . db_escape($db, $user['last_name']) . "',";
      $sql .= "'" . db_escape($db, $user['email']) . "',";
      $sql .= "'" . db_escape($db, $user['username']) . "',";
      $sql .= "'" . db_escape($db, $hashed_password) . "' ";
      $sql .= ")";
      $result = mysqli_query($db, $sql);
      if($result) {
        return true;
      } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
      }
    }
    function validate_users($user) {

      if(is_blank($user['first_name'])) {
        $errors[] = "A vezetéknév megadása kötelező..";
      } elseif (!has_length($user['first_name'], array('min' => 2, 'max' => 255))) {
        $errors[] = "A keresztnev legalább 2 legfeljebb 255 karakter hosszúságú lehet.";
      }

      if(is_blank($user['last_name'])) {
        $errors[] = "A keresztnev megadása kötelező.";
      } elseif (!has_length($user['last_name'], array('min' => 2, 'max' => 255))) {
        $errors[] = "A vezetéknév legalább 2 legfeljebb 255 karakter hosszúságú leht.";
      }

      if(is_blank($user['email'])) {
        $errors[] = "Email cím megadása kötelező.";
      } elseif (!has_length($user['email'], array('max' => 255))) {
        $errors[] = "Last name must be less than 255 characters.";
      } elseif (!has_valid_email_format($user['email'])) {
        $errors[] = "Email must be a valid format.";
      }

      if(is_blank($user['username'])) {
        $errors[] = "Felhasználónév megadása kötelező.";
      } elseif (!has_length($user['username'], array('min' => 4, 'max' => 255))) {
        $errors[] = "Username must be between 4 and 255 characters.";
      } elseif (!has_unique_username($user['username'], $user['id'] ?? 0)) {
        $errors[] = "Felhasználónév nem megengedett. Próbálj másikat!";
      }

      if(is_blank($user['password'])) {
        $errors[] = "Jelszó megadása kötelező.";
      } elseif (!has_length($user['password'], array('min' => 12))) {
        $errors[] = "A jelszónak 12 karakternél hosszabbnak kell lennie.";
      } elseif (!preg_match('/[A-Z]/', $user['password'])) {
        $errors[] = "Password must contain at least 1 uppercase letter";
      } elseif (!preg_match('/[a-z]/', $user['password'])) {
        $errors[] = "Password must contain at least 1 lowercase letter";
      } elseif (!preg_match('/[0-9]/', $user['password'])) {
        $errors[] = "Password must contain at least 1 number";
      } elseif (!preg_match('/[^A-Za-z0-9\s]/', $user['password'])) {
        $errors[] = "Password must contain at least 1 symbol";
      }

      if(is_blank($user['confirm_password'])) {
        $errors[] = "Confirm password cannot be blank.";
      } elseif ($user['password'] !== $user['confirm_password']) {
        $errors[] = "Password and confirm password must match.";
      }
      return $errors;
    }
    function find_user_by_username($username) {
      global $db;



      $sql = "SELECT * FROM users ";
      $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
      $sql .= "LIMIT 1";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);
      $username = mysqli_fetch_assoc($result);
      mysqli_free_result($result);
      return $username;
  }
  function find_all_users() {
    global $db;



    $sql = "SELECT * FROM users ";
    $sql .= "ORDER BY first_name DESC, last_name DESC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }
  function delete_user($user) {
    global $db;



    $sql = "DELETE FROM users ";
    $sql .= "WHERE id='" . db_escape($db, $user['id']) . "' ";
    $sql .= "LIMIT 1;";
    $result = mysqli_query($db, $sql);

    if($result) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }
  function find_user_by_id($id) {
    global $db;



    $sql = "SELECT * FROM users ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $user = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $user;
  }
?>
