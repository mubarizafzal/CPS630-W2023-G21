<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
    <div class="content-wrapper">
	    <div class="container">

	    <!-- Main content -->
	    <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
                <h1 class="page-header">Customer Reviews</h1>
                <ul>
                    <p>Review 1: ⭐⭐⭐⭐⭐
<br>Title: Exceptional service and eco-friendly products!<br><br>

I recently ordered a reclaimed wood dining table and some bamboo chairs from Green Delivery E-commerce, and I'm thrilled with my purchase! The online shopping experience was a breeze, and their commitment to sustainable practices makes me feel great about supporting their business. Plus, their customer service is top-notch - they were able to answer all my questions about the materials used in their products. Highly recommend!

Reviewer: Susan T.
<br><br>
Review 2: ⭐⭐⭐⭐
<br>Title: Good quality and fast shipping!<br><br>

I bought a stylish bookshelf from Green Delivery E-commerce last month. Although I had some doubts about the assembly process, it turned out to be quite easy with the instructions provided. The shelf looks fantastic in my living room and has received numerous compliments. The shipping was fast, but I did find the packaging to be a bit excessive. Overall, a good experience!

Reviewer: Mark H.
<br><br>
Review 3: ⭐⭐⭐⭐⭐
<br>Title: Love the modern designs and eco-consciousness!<br><br>

Green Delivery E-commerce has become my go-to store for furniture. I've purchased a coffee table, bed frame, and a couple of accent chairs, and I'm in love with all of them. Their modern designs and eco-friendly materials are a breath of fresh air in the furniture market. The quality of the products is outstanding, and their green delivery options are a bonus. Keep up the great work!

Reviewer: Jessica L.
<br><br>
Review 4: ⭐⭐⭐
<br>Title: Decent experience, could be better<br><br>

I ordered an office desk from Green Delivery E-commerce, and while the quality of the desk itself was good, there were some issues with the delivery. The package arrived a few days later than expected, and there were some minor scratches on one of the legs. I contacted customer service, and they offered me a discount on my next purchase, which was nice. Overall, a decent experience, but there's room for improvement.

Reviewer: Brian K.
<br><br>
Review 5: ⭐⭐⭐⭐⭐
<br>Title: Beautiful, eco-friendly furniture and excellent customer service<br><br>

I can't say enough good things about Green Delivery E-commerce! I was searching for the perfect, eco-friendly sofa, and I found it on their website. The fabric choices were amazing, and I love that they use recycled materials. When the sofa arrived, it was even more beautiful in person. The delivery team was professional and ensured everything was in perfect condition before leaving. I will definitely be shopping here again!

Reviewer: Samantha P.
<br><br>
Review 6: ⭐⭐⭐⭐
<br>Title: Great value for money, just a minor hiccup<br><br>

I ordered a TV stand and a floor lamp from Green Delivery E-commerce, and I'm quite satisfied with my purchase. The prices were competitive, and the quality of the products met my expectations. The only issue I faced was that one of the screws was missing from the TV stand package. However, customer service was responsive and sent the missing part promptly. Overall, a good experience, and I will consider them for future purchases.

Reviewer: Alex M.
<br><br>
Review 7: ⭐⭐⭐⭐⭐
<br>Title: One-stop-shop for sustainable furniture!<br><br>

I've been a loyal customer of Green Delivery E-commerce for the past two years, and they never disappoint. Their selection of eco-friendly furniture is vast, and the quality is always top-notch. I recently bought an outdoor dining set made from recycled materials, and it looks fantastic in my backyard. Their customer service team is always ready to help with any questions or concerns, making it a smooth shopping experience every time.

Reviewer: Lucy R.</p>
                    
                </ul> 
                </div>
	        </div>
        </section>
	     
	    </div>
	</div>
<h2 id="fh2">WE APPRECIATE YOUR REVIEW!</h2>
<h6 id="fh6">Your review will help us to improve our web hosting quality products, and customer services.</h6>


<form id="feedback" action="">
  <div class="pinfo">Your personal info</div>
  
<div class="form-group">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-user"></i></span>
  <input  name="name" placeholder="John Doe" class="form-control"  type="text">
    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
    <input name="email" type="email" class="form-control" placeholder="john.doe@yahoo.com">
     </div>
  </div>
</div>

<div class="form-group">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-globe"></i></span>
  <input  name="URL" placeholder="https://google.com" class="form-control"  type="url">
    </div>
  </div>
</div>

 <div class="pinfo">Rate our overall services.</div>
  

<div class="form-group">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-heart"></i></span>
   <select class="form-control" id="rate">
      <option value="1star">1</option>
      <option value="2stars">2</option>
      <option value="3stars">3</option>
      <option value="4stars">4</option>
      <option value="5stars">5</option>
    </select>
    </div>
  </div>
</div>

 <div class="pinfo">Write your feedback.</div>
  

<div class="form-group">
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
  <textarea class="form-control" id="review" rows="3"></textarea>
 
    </div>
  </div>
</div>

 <button type="submit" class="btn btn-primary">Submit</button>


</form>



<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>