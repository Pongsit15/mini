<main>
	<div class="row g-5">
		<div class="col-md-5 col-lg-4 order-md-last">
			<h4 class="d-flex justify-content-between align-items-center mb-3">
				<span class="text-primary">Your cart</span>
			</h4>
			<div class="card shadow-sm">
				<img src="img/people.png">
			</div>
			</form>
		</div>
		<div class="col-md-7 col-lg-8">
			<h4 class="mb-3">บริจัดการบุคลากร</h4>
			<form class="needs-validation" novalidate="">
				<div class="row g-3">
					<div class="col-sm-6">
						<label for="firstName" class="form-label">ชื่อ</label>
						<input type="text" name="txt_firstname" class="form-control" placeholder="">
						<div class="col-sm-6">
							<label for="lastName" class="form-label">นามสกุล</label>
							<input type="text" name="txt_lastname" class="form-control" placeholder="">
						</div>
							<div class="col-sm-6">
								<label for="email" class="form-label">อีเมล</label>
								<input type="text" name="txt_email" class="form-control" placeholder="">
							</div>
						</div>
						<!--	<div class="col-md-6">
						<label for="country" class="form-label">ตำเเหน่ง</label>
						<select class="txt_Positionl" id="country" required="">
							<option value="1">พนักงานสต๊อกสินค้า...</option>
							<option value="2">พนักงานเเพ็คของ</option>
							<option value="3">ผู้บริหาร</option>
							<option>....</option>
						</select>
						<div class="invalid-feedback">
							Please select a valid country.
						</div>
					</div>-->
						<div class="col-sm-6">
							<label for="password" class="form-label">เงินเดือนพนักงาน</label>
							<input type="text" name="txt_password" class="form-control" placeholder="">
							<!--	<div class="col-md-6">
						<label for="txt_Positionl" class="form-label">ประเภทผู้ใช้งาน</label>
						<select class="form-select" id="country" required="">
							<option value="">user</option>
							<option value="">admin</option>
							<option>....</option>
						</select>
						<div class="invalid-feedback">
							Please select a valid country.
						</div>
					</div>-->
							<div class="col-sm-6">
								<label for="db_salary" class="form-label">เงินเดือนพนักงาน</label>
								<input type="text" name="txt_db_salary" class="form-control" placeholder="">
							</div>
							<div class="col-14">
								<button type="button" name="btn_insert" class="btn btn-success"
									value="Insert">ยืนยัน</button>
								<a href="employee.php" class="btn btn-danger">ยกเลิก</a>
							</div>
						</div>
			</form>
		</div>
	</div>
</main>