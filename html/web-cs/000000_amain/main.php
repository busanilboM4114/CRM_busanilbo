			<main class="content">
				<div class="container-fluid p-0">

					<div class="row mb-2 mb-xl-3">
						<div class="col-auto d-none d-sm-block">
							<h3><strong>대시보드</strong></h3>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-6 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">전체 접속</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="log-in"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">2,382</h1>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">전체회원</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">14,212</h1>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">금일접속</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="log-in"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">2,100</h1>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">금일가입회원</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">64</h1>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-6 col-xxl-7">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<h5 class="card-title mb-0 pb3 pt5">월별 접속 접속통계</h5>
								</div>
								<div class="card-body pt-2 pb-3">
									<div class="chart chart-sm">
										<canvas id="chartjs-dashboard-line"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-xl-6">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<h5 class="card-title mb-0">브라우저별 접속통계</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="py-3">
											<div class="chart chart-xs">
												<canvas id="chartjs-dashboard-pie"></canvas>
											</div>
										</div>

										<table class="table mb-0">
											<tbody>
												<tr>
													<td><i class="fas fa-circle text-primary fa-fw"></i> Chrome <span
															class="badge badge-success-light">+12%</span></td>
													<td class="text-end">4306</td>
												</tr>
												<tr>
													<td><i class="fas fa-circle text-warning fa-fw"></i> Firefox <span
															class="badge badge-danger-light">-3%</span></td>
													<td class="text-end">3801</td>
												</tr>
												<tr>
													<td><i class="fas fa-circle text-danger fa-fw"></i> Edge</td>
													<td class="text-end">1689</td>
												</tr>
												<tr>
													<td><i class="fas fa-circle text-dark fa-fw"></i> Other</td>
													<td class="text-end">3251</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

						<div class="col-12 col-xl-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">유입경로</h5>
								</div>
								<table class="table table-striped">
									<thead>
										<tr>
											<th style="width:75%;">접속전 도메인</th>
											<th style="width:25%">접속수</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>https://search.naver.com</td>
											<td>1234</td>
										</tr>
										<tr>
											<td>직접입력또는즐겨찾기</td>
											<td>432</td>
										</tr>
										<tr>
											<td>https://google.com</td>
											<td>345</td>
										</tr>
										<tr>
											<td>https://m.search.naver.com</td>
											<td>234</td>
										</tr>
										<tr>
											<td>https://aaaa.com</td>
											<td>221</td>
										</tr>
										<tr>
											<td>https://bbbb.com</td>
											<td>201</td>
										</tr>
										<tr>
											<td>https://bbbb.com</td>
											<td>201</td>
										</tr>
										<tr>
											<td>https://bbbb.com</td>
											<td>201</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-xl-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">최근게시물</h5>
								</div>
								<table class="table table-striped">
									<thead>
										<tr>
											<th style="width:75%;">접속전 도메인</th>
											<th style="width:25%">접속수</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>https://search.naver.com</td>
											<td>1234</td>
										</tr>
										<tr>
											<td>직접입력또는즐겨찾기</td>
											<td>432</td>
										</tr>
										<tr>
											<td>https://google.com</td>
											<td>345</td>
										</tr>
										<tr>
											<td>https://m.search.naver.com</td>
											<td>234</td>
										</tr>
										<tr>
											<td>https://aaaa.com</td>
											<td>221</td>
										</tr>
										<tr>
											<td>https://bbbb.com</td>
											<td>201</td>
										</tr>
										<tr>
											<td>https://bbbb.com</td>
											<td>201</td>
										</tr>
										<tr>
											<td>https://bbbb.com</td>
											<td>201</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-12 col-xl-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">최근댓글</h5>
								</div>
								<table class="table table-striped">
									<thead>
										<tr>
											<th style="width:75%;">접속전 도메인</th>
											<th style="width:25%">접속수</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>https://search.naver.com</td>
											<td>1234</td>
										</tr>
										<tr>
											<td>직접입력또는즐겨찾기</td>
											<td>432</td>
										</tr>
										<tr>
											<td>https://google.com</td>
											<td>345</td>
										</tr>
										<tr>
											<td>https://m.search.naver.com</td>
											<td>234</td>
										</tr>
										<tr>
											<td>https://aaaa.com</td>
											<td>221</td>
										</tr>
										<tr>
											<td>https://bbbb.com</td>
											<td>201</td>
										</tr>
										<tr>
											<td>https://bbbb.com</td>
											<td>201</td>
										</tr>
										<tr>
											<td>https://bbbb.com</td>
											<td>201</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>

				</div>
			</main>

			<script>
			document.addEventListener("DOMContentLoaded", function() {
				var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
				var gradientLight = ctx.createLinearGradient(0, 0, 0, 225);
				gradientLight.addColorStop(0, "rgba(215, 227, 244, 1)");
				gradientLight.addColorStop(1, "rgba(215, 227, 244, 0)");
				var gradientDark = ctx.createLinearGradient(0, 0, 0, 225);
				gradientDark.addColorStop(0, "rgba(51, 66, 84, 1)");
				gradientDark.addColorStop(1, "rgba(51, 66, 84, 0)");
				// Line chart
				new Chart(document.getElementById("chartjs-dashboard-line"), {
					type: "line",
					data: {
						labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
						datasets: [{
							fill: true,
							backgroundColor: window.theme.id === "light" ? gradientLight : gradientDark,
							borderColor: window.theme.primary,
							data: [
								2115,
								1562,
								1584,
								1892,
								1587,
								1923,
								2566,
								2448,
								2805,
								3438,
								2917,
								3327
							]
						}]
					},
					options: {
						maintainAspectRatio: false,
						legend: {
							display: false
						},
						tooltips: {
							intersect: false
						},
						hover: {
							intersect: true
						},
						plugins: {
							filler: {
								propagate: false
							}
						},
						scales: {
							xAxes: [{
								reverse: true,
								gridLines: {
									color: "rgba(0,0,0,0.0)"
								}
							}],
							yAxes: [{
								ticks: {
									stepSize: 1000
								},
								display: true,
								borderDash: [3, 3],
								gridLines: {
									color: "rgba(0,0,0,0.0)",
									fontColor: "#fff"
								}
							}]
						}
					}
				});
			});
		</script>
		<script>
			document.addEventListener("DOMContentLoaded", function() {
				// Pie chart
				new Chart(document.getElementById("chartjs-dashboard-pie"), {
					type: "pie",
					data: {
						labels: ["Chrome", "Firefox", "IE", "Other"],
						datasets: [{
							data: [4306, 3801, 1689, 3251],
							backgroundColor: [
								window.theme.primary,
								window.theme.warning,
								window.theme.danger,
								"#E8EAED"
							],
							borderWidth: 5,
							borderColor: window.theme.white
						}]
					},
					options: {
						responsive: !window.MSInputMethodContext,
						maintainAspectRatio: false,
						legend: {
							display: false
						},
						cutoutPercentage: 70
					}
				});
			});
		</script>