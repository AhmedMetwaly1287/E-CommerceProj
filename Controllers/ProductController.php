<?php
require_once '../../Controllers/DBController.php';
require_once '../../Controllers/UPInterface.php';
require_once '../../Variables/product.php';
Class ProductController implements UP{
    private $DB;
    public function __construct() {
          $this->DB = DBController::getInstance();
        }

    public function addProduct(Product $product){
      if($this->DB->OpenCon()){
        $stmt = "insert into product values('','$product->title','$product->price','$product->bio','$product->sizes','$product->stock','$product->image',now())";
        $this->DB->insert($stmt);
        return true;
      }
      else{return false;}
     
    }

    public function editProductTitle(Product $product){
      if($this->DB->OpenCon()){
        $stmt ="update product set title = '{$product->title}' where id = '{$product->id}'";
        $this->DB->Update($stmt);
        return true;
      }
      else{return false;}
  
    }
    public function editProductPrice(Product $product){
      if($this->DB->OpenCon()){
        $stmt ="update product set price = '{$product->price}' where id = '{$product->id}'";
        $this->DB->Update($stmt);
        return true;
      }
      else{return false;}
     
  
    }

    public function editProductBio(Product $product){
        if($this->DB->OpenCon()){
          $stmt ="update product set bio = '{$product->bio}' where id = '{$product->id}'";
          $this->DB->Update($stmt);
    
          return true;
        }
        else{return false;}
       
    
      }
  
    public function editProductStock(Product $product){
      if($this->DB->OpenCon()){
        $stmt ="update product set stock = '{$product->stock}' where id = '{$product->id}'";
        $this->DB->Update($stmt);
  
        return true;
      }
      else{return false;}
     
  
    }
    public function editProductSizes(Product $product){
        if($this->DB->OpenCon()){
          $stmt ="update product set sizes = '{$product->sizes}' where id = '{$product->id}'";
          $this->DB->Update($stmt);
    
          return true;
        }
        else{return false;}
       
    
      }
      public function editPic(Product $product){
        if($this->DB->OpenCon()){
          $stmt = "update product set image ='{$product->image}' where id='{$product->id}'";
          $this->DB->Update($stmt);
          return true;
        }
        else{return false;}
       
      } 
  
    // public function editProductImage(Product $product){
    //   if($this->DB->OpenCon()){
  //Wip
    //   }
     
  
    // }
  
    public function Delete(Product $product){
      if($this->DB->OpenCon()){
        $stmt = "Delete from product where id='{$product->id}'";
        return $this->DB->Drop($stmt);
      }
      else{
        return false;
      }
     
  
    }

    
  public function getByID(Product $product){
    if($this->DB->OpenCon()){
      $stmt = "select * from product where id ='{$product->id}'";
      return $this->DB->Select($stmt);

    }
    else{
      return false;
    }
   

  }
    public function getAll(){
      if($this->DB->OpenCon()){
        $stmt = "select id,title,price,bio,sizes,stock,image from product";
        return $this->DB->Select($stmt);
  
      }
      else{
        return false;
      }
     
  
    }
    
    public function NoOfProduct(){
      if($this->DB->OpenCon()){
        $stmt = "select * from product";
        return $this->DB->Select($stmt);
  
      }
      else{
        return false;
      }
     
    }
 
   

  }



?>