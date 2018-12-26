<?php $__env->startSection('content'); ?>
<head>
  <style media="screen">
    .navbis{
      background-image: linear-gradient(to bottom, rgba(0,0,0,0.5), rgba(0,0,0,0.0));
    }
    .navbis:hover{
        background-image: linear-gradient(to bottom, rgba(0,0,0,1), rgba(0,0,0,1));
        border-bottom: solid 1px;
        border-color: #bf9b30;
        z-index: 2;
    }
  </style>
</head>
<div class="container">
        <video src="videos/video.mp4" autoplay loop muted></video>
    </div>
    <div class="container-fluid" id="anjing">
        <p class="text1">Introducing <br> the HolyShirt Collection</p>
            <img src="images/models.jpg" alt="">
        <p>We believe every body deserves to be celebrated, which is why we aim to fit everybody. At HolyShirt, you will never see the option to select a size on our website or find a size tag in your clothing. At HolyShirt we are building a size-free world.</p>
        <p class="text1">
            Our Collection
        </p>

        <div class="row" id="asd">
          <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($product->status != "DRAFT"): ?>
          <div class="col-sm-3">
          <a href="<?php echo e(route('products.show', ['id' => $product->id])); ?>">
            <?php if($product->cover): ?>
              <img src="<?php echo e(asset('storage/' . $product->cover)); ?>" width="100%"/>
            <?php endif; ?>
            <p class="tb"><br><?php echo e($product->title); ?></p>
            <p>Rp. <?php echo e($product->price); ?></p>
          </a>
          </div>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <a href="/collection" class="linkcol"> See the collection </a>
        <div class="row" id="asd">
            <div class="col-sm-8">
                <h2>We love shapes, not sizes.</h2>
                <h4>We make clothes custom-fit to you and ship them directly to your door.</h4>
            </div>
            <div class="col-sm-4">
                <img src="images/dualipa.jpg" alt="">
            </div>
        </div>
        <h3 style="margin-top: 5%;">It's All In The Details</h3>
        <h4 style="margin-bottom: 5%">We adjust every detail according to your measurements.</h4>
        <div class="row" id="asd">
            <div class="col-sm-4">
                <img src="images/1.jpg" alt="" width="100%">
                <p class="tc"><br>Natural fabrics chosen for maximum comfort.</p>
            </div>
            <div class="col-sm-4">
                <img src="images/2.jpg" alt="">
                <p class="tc"><br>Clean and sophisticated t-shirts fit for any occassion.</p>
            </div>
            <div class="col-sm-4">
                <img src="images/3.jpg" alt="">
                <p class="tc"><br>A timeless Oxford with modern touches.</p>
            </div>
            <h2 style="padding: 10% 0 2% 10% ">
                Custom-Fit To You
            </h2>
            <h4 style="padding: 0 40% 0 10%; text-align: left">
                Customize each item's fit according to your style preferences. Go looser for a more relaxed style, or shorten the length for something cropped. Customize as much or as little as you like at no extra cost.
            </h4>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>