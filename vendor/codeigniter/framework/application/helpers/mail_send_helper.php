<?php
/** *********************************************************************
 * Packages : helpers
 * File :
 * Comment :
 * Date : 20151209
 * Memo
 * =>
 *
 ********************************************************************** */
if ( ! function_exists('send'))
{
	// 경고메세지를 경고창으로
	/**
	 *
	 * @param string $name - 수신자 이름
	 * @param string $email - 수신자 이메일
	 * @param string $title - 메일 제목
	 * @param string $content - 메일 내용
	 * @return string - 상태결과값 리턴
	 */
	function send($name = "Name = mail test", $email="dvmoomoodv@gmail.com", $title="Title - mail test", $content="Content - mail test") {
		$CI =& get_instance();

		$CI->load->library('mailer');

		$mail = new PHPMailer();
		$mail->IsSMTP();

		$mail->Host = "tls://email-smtp.us-west-2.amazonaws.com";
		$mail->Port = 587;
		$mail->Username = "AKIAIMPITBYU26RCXJOA"; // SMTP 사용자 이름
		$mail->Password = "Ap79YzNQ9XzddYmksi2jjiB6UN3FC4HmyDbwrCS1rxOz"; // SMTP 비밀번호
		$mail->Mailer = 'smtp';
		$mail->SMTPAuth   = true;
		$mail->CharSet = 'utf-8';


		$mail->From = "classprep@naver.com";
		$mail->FromName = "ClassPrep"; // 보내는 사람 이름 // 1사람

		$mail->AddAddress($email, $name);

		$mail->WordWrap = 50;                                // set word wrap to 50 characters
		$mail->Priority = 1;
		$mail->IsHTML(true);

		$mail->Subject = $title." (noreply)"; // 메일 제목


		// $contentHTML = "
		// <table style='width: 100%; border-collapse: collapse'>
		// 	<tbody>
		// 		<tr>
		// 			<td style='font: 14px/1.4285714 Arial, sans-serif; padding: 30px;'>
		// 				<table style='width: 100%; border-collapse: collapse'>
		// 					<tbody>
		// 						<tr>
		// 							<td style='font: 14px/1.4285714 Arial, sans-serif; color: #707070'>
		// 								<table style='width: 100%; border-collapse: collapse'>
		// 									<tbody>
		// 										<tr>
		// 											<td align='center' style=' background: #63A8E5; font: 14px/1.4285714 Arial, sans-serif; padding: 10px; width: 100px; border-radius: 5px;'>
		// 												<a href='https://www.theclassprep.com' style='color: #3572b0; text-decoration: none; border:0;outline:none;' target='_blank'>
		// 													<img height='50' src='https://www.theclassprep.com/assets/classprep/images/logo/main-logo-shadow.png' alt='ClassPrep'>
		// 												</a>
		// 											</td>
		// 										</tr>
		// 									</tbody>
		// 								</table>
		// 							</td>
		// 						</tr>
		//             <tr>
		//               <td style='height:10px;'>
		//               </td>
		//             </tr>
		// 						<tr>
		// 							<td style='font: 14px/1.4285714 Arial, sans-serif; background-color: #ffffff; border-radius: 5px'>
		// 								<div style='border: 1px solid #cccccc; border-radius: 5px; padding: 20px; min-height:200px;'>
		// 									<table style='width: 100%; border-collapse: collapse'>
		// 										<tbody>
		// 											<tr>
		// 												<td style='font: 14px/1.4285714 Arial, sans-serif; padding: 0; margin-bottom: 0; margin-top: 0' '>
		//
		//
		// 													$content
		//
		//
		//
		// 												</td>
		// 											</tr>
		// 										</tbody>
		// 									</table>
		// 								</div>
		// 							</td>
		// 						</tr>
		//             <tr>
		//               <td align='right' style='font: 14px/1.4285714 Arial, sans-serif; padding-top:10px;'>
		//                   <a href='https://www.theclassprep.com' target='_blank'>www.theclassprep.com</a>
		//                   <br />
		//                   <a href='https://www.theclassprep.com/intro/policy' target='_blank'>Private Policy</a>
		//                   &nbsp;&nbsp;|&nbsp;&nbsp;
		//                   <a href='https://www.theclassprep.com/intro/term' target='_blank'>Terms of Service</a>
		//                   <br />
		//                   <a href='https://www.rocketpunch.com/companies/classprep-1' target='_blank'>About us</a>
		//                   &nbsp;&nbsp;|&nbsp;&nbsp;
		//                   <a href='https://www.facebook.com/learning.classprep/' target='_blank'>Facebook</a>
		//               </td>
		//             </tr>
		// 					</tbody>
		// 				</table>
		// 			</td>
		// 		</tr>
		// 	</tbody>
		// </table>
		//
		//
		// ";

		$contentHTML = "
		<html style='padding:0px; margin:0px; font-family: arial, sans-serif;'>
			<body style='padding:0px; margin:0px;'>
				<table style='width: 100%; border-collapse: collapse'>
					<tbody style='padding:0px; margin:0px;'>
						<tr style='padding:0px; margin:0px;'>
							<td style='font: 14px/1.4285714 Arial, sans-serif; padding:0px; margin:0px;'>
								<table style='padding:0px; margin:0px;width: 100%; border-collapse: collapse'>
									<tbody style='padding:0px; margin:0px;'>
										<tr style='padding:0px; margin:0px;'>
											<td style='padding:0px; margin:0px;font: 14px/1.4285714 Arial, sans-serif; color: #707070'>
												<table style='padding:0px; margin:0px;width: 100%; border-collapse: collapse'>
													<tbody style='padding:0px; margin:0px;'>
														<tr style='padding:0px; margin:0px;'>
															<td align='center' style=' background: #63A8E5; font: 14px/1.4285714 Arial, sans-serif; width: 100px;padding:20px;padding-top:20px;padding-bottom:70px;'>
																<a href='https://www.theclassprep.com' target='_blank' style='float:left;'>
																	<img height='50' src='https://www.theclassprep.com/assets/classprep/images/logo/main-logo-shadow.png' alt='ClassPrep'>
																</a>

																<a href='https://classprep.github.io/help/' target='_blank' style='float:right;text-decoration:none; color:#fafafa;'>
																	FAQ
																</a>

																<span style='float:right; color:#fafafa;'>
																	&nbsp;&nbsp;|&nbsp;&nbsp;
																</span>
																<a href='https://classprep.github.io/' target='_blank' style='float:right; text-decoration:none; color:#fafafa;'>
																	About us
																</a>



																<h1 style='clear:both;color:#fafafa; font-size:50px; font-weight:normal; line-height:0.8;'>
																	<br>
																	We flip, Classprep!
																</h1>
																<h3 style='color:#fafafa; font-size:30px; font-weight:normal;line-height:0.1;'>강의에 창의성을 더하다</h3>
																<!--
																<a href='https://www.theclassprep.com' style='color: #3572b0; text-decoration: none; border:0;outline:none;' target='_blank'>
																	<img height='50' src='https://www.theclassprep.com/assets/classprep/images/logo/main-logo-shadow.png' alt='ClassPrep'>
																</a>
																-->
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
										<tr>
											<td style='font: 14px/1.4285714 Arial, sans-serif; background-color: #ffffff; border-radius: 5px'>
												<div style='padding: 20px; min-height:400px;'>
													<table style='width: 100%; border-collapse: collapse'>
														<tbody>
															<tr>
																<td style='font: 20px/1.4285714 Arial, sans-serif; padding: 0; margin-bottom: 0; margin-top: 0; text-align:center;'>


																	$content



																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</td>
										</tr>
										<tr>
											<td style='font: 14px/1.4285714 Arial, sans-serif; background-color: #ffffff;'>
												<div style='padding: 30px; height:200px;'>
													<div style='padding : 30px 30px 40px 30px; background-color:#f0f0f0;'>
														<table style='width: 100%; border-collapse: collapse'>
															<tbody>
																<tr>
																	<td style='font: 14px/1.4285714 Arial, sans-serif; padding: 0; margin-bottom: 0; margin-top: 0; font-weight:bold;'>


																		<h4>
																		본 메일은 발신 전용 메일이므로 회신이 되지 않습니다
																		</h4>
																		<h4>
																		문의 사항은 홈페이지 FAQ 또는 이메일 bellik@theclassprep.com으로 문의 주시기 바랍니다.
																		</h4>
																		<hr>
																		<h4>
																		서울 서대문구 연세로 50 연세대학교 공학원 114A (주)클래스프렙</h4>
																		<h4>
																		CLASSPREP Co., Ltd.</h4>



																	</td>
																</tr>
															</tbody>
														</table>
													</div>

												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</body>
		</html>
		";
		$mail->Body = $contentHTML;
		$mail->AltBody = "ClassPrep Mail";


		// slack($content);// slack messanger connet 
		if(!$mail->Send()) {
			$data["check"] = "error";
			$data["message"] = "Error: " . $mail->ErrorInfo;
		} else {
			$data["check"] = "success";
			$data["message"] = "Message sent correctly!";
		}
		return $data;
	}
}
