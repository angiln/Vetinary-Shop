<?php
include 'nav copy.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<style>
        a 
        {
            color: white;
        }
        .pricing-container
         {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            background-color:  #f0f0f0;

        }
        .pricing-container h2
        {
            font-size: 28px;
            color: rgb(69, 103, 133);
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-weight: normal;
        }
        .pricing-card 
        {
            width: 300px;
            height: 415px;
            padding: 20px;
            margin: 2%;
            /* border: 1px solid #ccc; */
            border-radius: 10px;
            text-align: center;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .pricing-card:hover 
        {
            transform: translateY(-5px);
        }
        .pricing-card li 
        {
            margin-top: 1%;
            font-size: 14px;
            font-weight: lighter;
            line-height: 24px;
           
        }

        .pricing-card h2
         {      
            margin-top: 0;
        }

        .price
        {
            font-size: 25px;
            font-weight: bold;
            color: rgb(66, 128, 203);
        
        }

        .order-button
         {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .order-button:hover
         {
             background-color: #45a049;
        }
        .img5
        {
  
            
            display: block;
            margin: 0 auto;
            margin-top: 3%;
            text-align: center;  /* center images */
            align-items: center;
            justify-content: center;
           
        }
       

        .subs-container 
        {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            background-color:  #f0f0f0;
        }

            /* Style the subscription cards */
        .subs-card 
        {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.2s ease-in-out;
            width: 300px;
            margin: 10px;
            margin: 2% 2.8%; 

        }

        .subs-card:hover 
        {
            transform: translateY(-5px);
        }

            /* Style the headings */
            .subs-container h2 
            {
                color: #333;
                font-size: 24px;
                font-weight: lighter;
                /* margin-bottom: 5px; */
            }

            /* Style the plans */
            .plan 
            {
                margin-bottom: 10px;
                font-weight: lighter;
            }

            .subs-card h3 
            {
                font-size: 18px;
                margin-bottom: 15px;
                font-weight: light;
            }
            .subs-container h4
            {
                margin-top: 15px;
                color: #306489;
                font-size:  18px;
                font-weight: lighter;
            }

            /* Style the list items */
            .subs-card ul li 
            {
                list-style: none;
                margin-bottom: 8px;
                font-size: 1.2em;
               
            }

            /* Style the cost and savings */
            li h3 {
            color: #ff6b6b;
            font-size: 20px;
            margin-top: 10px;
            }

            /* Style the order button */
            .order-button a
            {
            /* background-color: #007BFF; */
                border: none;
                border-radius: 5px;
                color: #fff;
                padding: 10px 10px;
                text-decoration: none;
                font-size: 16px;
                transition: background-color 0.2s ease-in-out;
            }

            
            .heading
            {
                justify-content: center;
                display: flex;
                align-items:  center;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: 50px;
                margin-top: 10%;
            }

            .heading1
            {
                justify-content: center;
                display: flex;
                align-items:  center;
                font-family: 'jokerman';
                font-size: 25px;
                margin-top: 50px;
                color: rgb(59, 1, 1);
            }

            .heading2
            {
                justify-content: center;
                display: flex;
                align-items:  center;
                position: relative;
                font-family: 'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', sans-serif;
                font-size: 50px;
                margin-top: 50px;
                color: #306489;
            }
            
            .normal
            {
                justify-content: center;
                display: flex;
                align-items:  center;
                font-family: 'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', sans-serif;
                font-size: 20px;
                margin-top: 10px;
                /* color: #306489; */
                color: grey;
                margin-bottom: 4%;
            }

            .images
            {
                display: flex;
                /* margin-top: 1%; */
                align-items: center;
                position: relative;
                margin-top: 5%;
                padding: 1%;
                left: 5%;
                margin-bottom: 5%;

            }

            /* .footer 
            {
                background-color: #f2f2f2;
                padding: 50px;
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                align-items: center;
            } */

            /* Responsive design */
            @media (max-width: 768px)
            {
            .subs-container {
                flex-direction: column;
                align-items: center;
            }

            .subs-card {
                width: 80%;
            }
            }
            .img_container .images
            {
                display: flex;
                justify-content: center;
                align-items: flex-start;
                background-color:  #f0f0f0;
                border-radius: 10px;
                box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
                transition: background-color 0.2s ease-in-out;

            }

            .img_container .images:hover 
            {
                transform: translateY(-5px);
            }
            
            .blank-space 
            {
                height: 150px; /* Adjust the height as needed */
            }



            
    </style>
 
<body>
    
    <p class="heading">
        We Provide Best Services
    </p><br>
    <div>
        <div class="img_container">
            <img src="servicces list images.png" class="images"/>
        </div>
        
        <p class="heading2">
            Laundry - Price List
        </p>
        <p class="normal">
            We offer most reasonable rates with quick turnaround time
        </p>
       


        <div class="pricing-container">
            <div class="pricing-card">
              <h2>Wash & Fold</h2><br><br>
              <ul>
                <li>48hrs Turnaround</li>
                <li>Machine Washed & Dried</li>
                <li>Combined Packaging</li>
                <li>Preferred for Regular Wears</li>
                <li>Affordable Price</li>
              </ul><br><br><br><br>
              <p class="price">₹120/kg</p>
              <button class="order-button"><a href="login.php" > Order Now </a></button>
            </div>
            <div class="pricing-card">
              <h2>Wash & Iron</h2><br><br>
              <ul>
                <li>48hrs Turnaround</li>
                <li>Machine Washed & Dried</li>
                <li>Combined Packaging</li>
                <li>Preferred for Casual Wears & Regular Wears</li>
                <li>Only Ironable clothes are Ironed</li>
              </ul><br><br>
              <p class="price">₹165/kg</p>
              <button class="order-button"><a href="login.php" > Order Now </a></button>
            </div>
            <div class="pricing-card">
              <h2>Express Laundry</h2><br><br>
              <ul>
                <li>48hrs Turnaround</li>
                <li>Machine Washed & Dried</li>
                <li>Combined Packaging</li>
                <li>Preferred for Casual Wears & Regular Wears</li>
                <li>Super Quick Turnaround Time</li>
              </ul><br><br>
              <p class="price">₹250/kg</p>
              <button class="order-button"> <a href="login.php" > Order Now </a> </button>
            </div>
          </div>
        
           <!-- <img src="/images/LaundryServiceList.png" alt="servie_list" class="img4">
         -->
        
    </div>

    <p class="heading2">
            Subscription Plan
        </p>
        <p class="normal">
            We offer most reasonable rates with quick turnaround time
        </p>

    <div class="subs-container">
            <div class="subs-card">
                <h2>Individual</h2><br><br>
                <div class="plan">
                <ul>
                    <li>
                        <h3>
                            Plan 1 
                        </h3>
                        Wash & Fold: 15 kg
                    </li>
                </div>
                <div class="plan">
                    <li>
                        <h3>
                            Plan 2
                        </h3>
                        <li>Wash & Fold: 10 kg </li>
                          Wash & Iron: 4 kg
                    </li>
                </div>
                <div class="plan">
                    <li>
                        <h3>
                            Plan 3
                        </h3>
                    </li>
                        <li>Wash & Iron: 12 kg</li>
                </div>
                    <li>Cost: Rs 1600</li>
                    <li>Pickups: 4</li>
                    <li>Validity: 1 Month</li>
                    <li>CleanBacks: 1 kg [W&F]</li>
                    <li>
                        <h4>
                        Save: Rs 320
                        </h4>
                    </li>
                </ul><br>
                <button class="order-button"><a href="login.php" > Order Now </a></button>
                </div>
                <div class="subs-card">
                <h2>Family</h2><br><br>
                <div class="plan">
                <ul>
                    <li>
                        <h3>
                            Plan 1 
                        </h3>
                        Wash & Fold: 24 kg
                    </li>
                </div>
                <div class="plan">
                    <li>
                        <h3>
                            Plan 2
                        </h3>
                        <li>Wash & Fold: 15 kg</li>
                        Wash & Iron: 7 kg
                    </li>
                </div>
                <div class="plan">
                    <li>
                        <h3>
                            Plan 3
                        </h3>
                        Wash & Iron: 19 kg
                    </li>
                </div>
                    <li>Cost: Rs 2500</li>
                    <li>Pickups: 4</li>
                    <li>Validity: 1 Month</li>
                    <li>CleanBacks: 2 kg [W&F]</li>
                    <li>
                        <h4>
                        Save: Rs 620
                        </h4>
                    </li>
                </ul><br>
                <!-- <p class="price">₹165/kg</p> -->
                <button class="order-button"><a href="login.php" > Order Now </a></button>
                </div>
                <div class="subs-card">
                <h2>Business</h2><br><br>
                <ul>
                    <li>
                        <h3>
                            Plan 1 
                        </h3>
                        Wash & Fold: 45 kg
                    </li>
                    <li>
                        <h3>
                            Plan 2
                        </h3>
                        <li>Wash & Fold: 28 kg</li>
                            Wash & Iron: 14 kg
                    </li>
                    <li>
                        <h3>
                            Plan 3
                        </h3>
                        Wash & Iron: 35 kg
                    </li>
                    <li>Cost: Rs 4500</li>
                    <li>Pickups: 4</li>
                    <li>Validity: 1 Month</li>
                    <li>CleanBacks: 4 kg [W&F]</li>
                    <li>
                        <h4>
                            Save: Rs 1380
                        </h4>
                    </li>
                </ul><br>
                <button class="order-button"> <a href="login.php" > Order Now </a> </button>
                </div>
            </div>
                        
    </div>
    <div class="blank-space"></div>


</body>
</html>
<?php
include 'footer.php';
?>