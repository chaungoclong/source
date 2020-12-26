

<td valign="top"  style="border-right-style: dotted; border-right-color: red;">
							<table width="100%" cellpadding="0px" cellspacing="0px">
								<tr>
									<td valign="top" height="40px" colspan="2">
										<img src="../image/nut/GIOITHIEU.gif" alt="">
									</td>
								</tr>
								<tr height="800px">
									<td width="5px"></td>
									<td align="center" valign="top" id="bgimg" width="">
										<form action="process.php" method="get">	
											<table  class="form" bgcolor="#DAB0B0" width="80%" cellpadding="0px" cellspacing="0px" border="1px" height="100%">
												<tr>
													<td align="right">Họ và tên:</td>
													<td><input type="text" name="name" size="30" /></td>
													<td width="20px" rowspan="11"></td>
												</tr>
												<tr>
													<td align="right">Địa chỉ liên lạc:</td>
													<td><input type="text" name="address" size="30" /></td>
												</tr>
												<tr>
													<td align="right">Số Điện Thoại:</td>
													<td><input type="text" name="phone" size="30" /></td>
												</tr>
												<tr>
													<td align="right">Giới tính:</td>
													<td>
														<input type="radio" name="gender" value="nam" /> Nam
														<input type="radio" name="gender" value="nữ" /> Nu
													</td>
												</tr>
												<tr>
													<td align="right">Email:</td>
													<td><input type="text" name="email" size="30" /></td>
												</tr>
												<tr>
													<td align="right">Tuổi:</td>
													<td><input type="number" name="age" size="30" /></td>
												</tr>
												<tr>
													<td align="right">Sản Phẩm:</td>
													<td>
														<input type="checkbox" name="sanpham[]"value="TV1"/> TV Plasma
														<input type="number" name="soluong[]" value="0">
														 <br>	
														<input type="checkbox" name="sanpham[]" value="DVD"/> DVD Playback 
														<input type="number" name="soluong[]" value="0">
														<br>	
														<input type="checkbox" name="sanpham[]" value="KO"/> Karaoke 
														<input type="number" name="soluong[]" value="0">
														<br>	
														<input type="checkbox" name="sanpham[]" value="MG"/> May giat 
														<input type="number" name="soluong[]" value="0">
														<br>
														<input type="checkbox" name="sanpham[]" value="ML"/> May lanh 
														<input type="number" name="soluong[]" value="0">
														<br>
														<input type="checkbox" name="sanpham[]" value="TV2"/> TV sieu phang 
														<input type="number" name="soluong[]" value="0">
														<br>
														<input type="checkbox" name="sanpham[]" value="MP3"/> May nghe nhac MP3
														<input type="number" name="soluong[]" value="0">
														<br>
														<input type="checkbox" name="sanpham[]" value="AM"/> Ampli va Micro
														<input type="number" name="soluong[]" value="0">
													</td>
												</tr>
												<tr>
													<td align="right">Đại lí phân phối:</td>
													<td>
														<select name="dai_ly">
															<option value="Thế Giới Di Động">Thế Giới Di Động</option>
															<option value="FPT">FPT</option>
														</select>
													</td>
												</tr>
												<tr>
													<td align="right">Gửi hình</td>
													<td>
														<input type="file" name="image"/>
													</td>
												</tr>
												<tr>
													<td align="right">Yêu cầu</td>
													<td>
														<textarea name="yeucau" rows="10" cols="40"></textarea>
													</td>
												</tr>
												<tr>
													<td></td>
													<td align="center">
														<button type="submit" name="submit">Đồng ý</button>
														<button type="reset" name="reset">Không đồng ý</button>
													</td>
												</tr>
											</table>
										</form>	
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>	
		</tr>
	</table>
</body>