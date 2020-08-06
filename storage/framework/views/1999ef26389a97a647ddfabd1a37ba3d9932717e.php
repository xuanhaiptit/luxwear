<div>
	<h3>Thông tin khách hàng</h3>
	<p>
		<strong class="info">Khách hàng: </strong>
		<?php echo e($info['fullname']); ?>

	</p>
	<p>
		<strong class="info">Email: </strong>
		<?php echo e($info['email']); ?>

	</p>
	<p>
		<strong class="info">Điện Thoại</strong>
		<?php echo e($info['phone']); ?>

	</p>
	<p>
		<strong class="info">Địa chỉ</strong>
		<?php echo e($info['address']); ?>

	</p>
	<p>
		<strong class="info">Ghi chú</strong>
		<?php echo e($info['note']); ?>

	</p>

</div>
    <div class="form-group">
       <table width="100%" border="1" cellspacing="0" cellpadding="3" bordercolor="#ffcccc" style="text-align:center;">
       	<thead>
       		<tr>
			    <th>Tên sản phẩm</th>
			    <th>Hình ảnh</th>
			    <th>Đơn giá</th>
			    <th>Số lượng</th>
			    <th>Thành tiền</th>
			</tr>
       	</thead>
       	<?php if(!empty(Cart::content())): ?>
       		<?php $cart = Cart::content() ?>
	        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        <tbody>
	            <tr>
	                <td><?php echo e($item->name); ?></td>
					<td><img style="width: 100px;height: auto;" src="<?php echo e($message->embed(asset('resources/upload/product/'.$item->options->img))); ?>" alt="" /></td>
	                <td><?php echo e(number_format($item->price)); ?> đ</td>
	                <td><?php echo e($item->qty); ?></td>
	                <td><?php echo e(number_format($item->qty * $item->price)); ?> đ</td>
	            </tr>
	        </tbody>
	        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
            <td><strong>Tổng tiền: </strong></td>
            <td colspan="4" class="text-right"><strong><?php echo e(Cart::subtotal(0,',','.')); ?> đ</strong></td>
        </tr>
    </table>
</div>
<?php /**PATH G:\xampp_7\htdocs\ismart\resources\views/emails/checkout_email.blade.php ENDPATH**/ ?>