<?php

class ContentManager {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getStatti($cat = false) {
        $sql = "SELECT id, title, date, img_src, discription, id_galery FROM statti";
        
        if ($cat) {
            $sql .= " WHERE cat = ?";
        }

        $stmt = $this->db->prepare($sql);
        
        if ($cat) {
            $stmt->bind_param('s', $cat);
        }
        
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($stmt->error) {
            exit($stmt->error);
        }
        
        if ($result->num_rows === 0) {
            exit('Статтей нет');
        }
        
        $row = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        
        return $row;
    }

    public function getText($id) {
        $sql = "SELECT id, title, date, img_src, text FROM statti WHERE id = ?";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($stmt->error) {
            exit($stmt->error);
        }
        
        if ($result->num_rows === 0) {
            exit('Статтей нет');
        }
        
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $stmt->close();
        
        return $row;
    }

    public function getCat() {
        $sql = "SELECT id_category, name_category FROM category";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($stmt->error) {
            exit($stmt->error);
        }
        
        if ($result->num_rows === 0) {
            exit('Категорий нет');
        }
        
        $row = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        
        return $row;
    }

    public function render($tmp, $vars) {
        if (file_exists('theme/' . $tmp . ".tpl.php")) {
            ob_start();
            extract($vars);
            require 'theme/' . $tmp . ".tpl.php";
            return ob_get_clean();
        }
    }
}



// function getStatti($cat = false) {
//     global $db;
    
//     $sql = "SELECT id, title, date, img_src, discription, id_galery FROM statti";
    
//     if ($cat) {
//         $sql .= " WHERE cat = ?";
//     }
    
//     $stmt = $db->prepare($sql);
    
//     if ($cat) {
//         $stmt->bind_param('s', $cat);
//     }
    
//     $stmt->execute();
    
//     $result = $stmt->get_result();
    
//     if ($stmt->error) {
//         exit($stmt->error);
//     }
    
//     if ($result->num_rows === 0) {
//         exit('Статтей нет');
//     }
    
//     $row = $result->fetch_all(MYSQLI_ASSOC);
    
//     $stmt->close();
    
//     return $row;
// }


// function getText($id) {
//     global $db;
    
//     $sql = "SELECT id, title, date, img_src, text FROM statti WHERE id = ?";
    
//     $stmt = $db->prepare($sql);
    
//     $stmt->bind_param('i', $id);
    
//     $stmt->execute();
    
//     $result = $stmt->get_result();
    
//     if ($stmt->error) {
//         exit($stmt->error);
//     }
    
//     if ($result->num_rows === 0) {
//         exit('Статтей нет');
//     }
    
//     $row = $result->fetch_array(MYSQLI_ASSOC);
    
//     $stmt->close();
    
//     return $row;
// }



// function getCat() {
//     global $db;
    
//     $sql = "SELECT id_category, name_category FROM category";
    
//     $stmt = $db->prepare($sql);
    
//     $stmt->execute();
    
//     $result = $stmt->get_result();
    
//     if ($stmt->error) {
//         exit($stmt->error);
//     }
    
//     if ($result->num_rows === 0) {
//         exit('Статтей нет');
//     }
    
//     $row = $result->fetch_all(MYSQLI_ASSOC);
    
//     $stmt->close();
    
//     return $row;
// }



// function render($tmp,$vars) {
//     if(file_exists('theme/'.$tmp.".tpl.php")) {
//         ob_start();
//         extract($vars);
//         require 'theme/'.$tmp.".tpl.php";
//         return ob_get_clean();
//     }
// }


	// function get_statti($cat=FALSE) {
	// 	global $db;
	// 	$sql = "SELECT id,title,date,img_src,discription,id_galery
	// 										FROM statti";
		
	// 	if($cat) {
	// 		$sql .= " WHERE cat = '$cat'";
	// 	}
	// 	$result = mysqli_query($db,$sql);
	// 	if (!$result){
	// 		exit(mysqli_error($db));
	// 	}
	// 	if(mysqli_num_rows($result) == 0) {
	// 		exit('Статтей нет');
	// 	}
	// 	$row = array();
	// 	for($i = 0; $i < mysqli_num_rows($result); $i++) {
	// 		$row[] = mysqli_fetch_array($result,MYSQLI_ASSOC);
	// 	}			
	// 	return $row;
	// }
	
	// function get_text($id) {
		
	// 	global $db;
		
	// 	$sql = "SELECT id,title,date,img_src,text
	// 										FROM statti WHERE id='$id'";
	// 	$result = mysqli_query($db,$sql);									
		
	// 	if (!$result){
	// 		exit(mysqli_error($db));
	// 	}
	// 	if(mysqli_num_rows($result) == 0) {
	// 		exit('Статтей нет');
	// 	}
	// 	$row = array();
	// 	for($i = 0; $i < mysqli_num_rows($result); $i++) {
	// 		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	// 	}				
	// 	return $row;
	// }
	
	// function get_cat() {
		
	// 	global $db;
	// 	$result = mysqli_query($db,"SELECT id_category,name_category
	// 										FROM category");
	// 	if (!$result){
	// 		exit(mysqli_error($db));
	// 	}
	// 	if(mysqli_num_rows($result) == 0) {
	// 		exit('Статтей нет');
	// 	}
	// 	$row = array();
	// 	for($i = 0; $i < mysqli_num_rows($result); $i++) {
	// 		$row[] = mysqli_fetch_array($result,MYSQLI_ASSOC);
	// 	}				
	// 	return $row;
	// }
	
	