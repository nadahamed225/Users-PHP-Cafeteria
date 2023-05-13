<?php



// class HomeController extends Controller
// {
//     private $product;
//     private $OrderDetails;
//     private $user;
//     private $userid;
//     private $Order;
//     private $orderid;
//     public function __construct()
//     {
//         $this->product = new Products();
//         $this->OrderDetails = new OrderDetails();
//         $this->user = new User();
//         $this->Order = new Order();
//     }
//     public function index()
//     {
//         $data['products'] = $this->product->getAllProducts();
//         $data['user'] = $this->user->getUser(2);
//         $data['orders'] = $this->OrderDetails->getORders();
       
//         return $this->view('products/index', $data);
//     }




//     public function cart($id,$quantity,$total)
//     {
                  
//         // var_dump($_SESSION['cart']);
//         // return;

//         $totalPrice=$total;
//         $pro=$this->product->getProduct($id);
//         if($pro)    
//         {
            
//             session_start();
//             // Check if the cart exists in the session
//             if (!isset($_SESSION['cart'])) {
//             // If the cart doesn't exist, create an empty array
//             $_SESSION['cart'] = array();
//             }
            
//             $i=0;
            
//             foreach ($_SESSION['cart'] as $result){
//                 if($pro[0]['name']==$result['name']){
//                     $totalPrice-=$_SESSION['cart'][$i]['price'];
//                     $_SESSION['cart'][$i]['quantity']=$quantity;
//                     $_SESSION['cart'][$i]['price']=$quantity* $pro[0]["price"];
//                     $totalPrice+=$_SESSION['cart'][$i]['price'];
//                     $result = [
//                         'name' => $pro[0]["name"],
//                         'price' => $_SESSION['cart'][$i]['price'],
//                         'quantity' =>$_SESSION['cart'][$i]['quantity'],
//                         'id' =>$pro[0]["id"],
//                         'first' => 0,
//                         'totalPrice' =>$totalPrice,
//                         'picture' => base64_encode($pro[0]["picture"]) // Encode the picture as base64
//                     ];
//                     echo json_encode($result);
//                     return;
//                 }
//                 $i++;
//               }
             
            // Add the item to the cart
    //         $item = array(
    //         'name' => $pro[0]["name"],
    //         'price' => $pro[0]["price"]*$quantity,
    //         'quantity' => $quantity,
    //         'id' =>$pro[0]["id"],
    //         'first' => 1,
    //         'picture' => base64_encode($pro[0]["picture"]) // Encode the picture as base64
    //         );
    //         $_SESSION['cart'][] = $item;
    //         $data['success'] = "Product Have Been saved";
    //         $totalPrice+=$pro[0]["price"]*$quantity;
    //         $result = [
    //             'name' => $pro[0]["name"],
    //             'price' => $_SESSION['cart'][$i]['price'],
    //             'quantity' =>$_SESSION['cart'][$i]['quantity'],
    //             'id' =>$pro[0]["id"],
    //             'first' => 1,
    //             'totalPrice' =>$totalPrice,
    //             'picture' => base64_encode($pro[0]["picture"]) // Encode the picture as base64
    //         ];
    //         echo json_encode($result);
            
    //     }
    //     else 
    //     {
    //         $data['error'] = "Error";
    //     }
    // }

    // public function addToCard($id)
    // {

    //     $Product = $this->product->getProduct($id);
       

    //     session_start();
    //     if (!isset($_SESSION['card'])) {
    //         $_SESSION['card'] = array();
    //     }


    //     for ($i = 0; $i < count($_SESSION['card']); $i++) {
    //         if ($Product[0]["name"] == $_SESSION['card'][$i]['name']) {
    //             $_SESSION['card'][$i]['quantity'] += 1;
    //             $_SESSION['card'][$i] = [
    //                 'name' => $Product[0]["name"],
    //                 'price' => $Product[0]["price"] * $_SESSION['cart'][$i]['quantity'],
    //                 'quantity' => $_SESSION['cart'][$i]['quantity'],
    //                 'id' => $Product[0]["id"]
    //             ];
    //             echo json_encode($_SESSION['card'][$i]);
    //             return;
    //         }
    //     }

    //     try {
    //         $item = [
    //             "name" => $Product[0]["name"],
    //             "price" => $Product[0]["price"],
    //             "quantity" => 1
    //         ];
    //         $_SESSION['card'] =  $item;
    //         $data['success'] = "Product Have Been saved";
    //         $result = [
    //             'name' => $Product[0]["name"],
    //             'price' => $Product[0]["price"],
    //             'quantity' => 1,
    //             'id' =>$Product[0]["id"],
            
    //         ];

    //         echo json_encode($result);
     
    //     } catch (Exception $e) {
    //         $data['error'] = "'Caught exception: ',   $e->getMessage(), '\n'";    
    //     }
    // }

    


//     public function delectfromcart($id,$total)
//     {
//         $totalPrice=$total;
//         $pro=$this->product->getProduct($id);
//         if($pro)
//         {
//             session_start();
//             if (isset($_SESSION['cart'])) {
           
//             foreach ($_SESSION['cart'] as $i => $result){
//                 if($pro[0]['name']==$result['name']){
//                     $totalPrice-=$_SESSION['cart'][$i]['price'];
//                     unset($_SESSION['cart'][$i]);
//                     $result = [
//                         'name' => $result["name"],
//                         'price' => $result["price"],
//                         'totalPrice' =>$totalPrice,
//                         'quantity' =>$result['quantity'],
//                         'i'=>$_SESSION['cart']
//                     ];
//                     echo json_encode($result);
//                 }  
//               }
//             }
//         }
        
//         else 
//         {
//             $data['error'] = "Error";
//         }
//     }

    



// }