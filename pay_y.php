<!DOCTYPE html>
<html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Responsive Payment Gateway Form Design using HTML and CSS | Codehal</title>
      <link rel="stylesheet" href="pay.css">
    </head>

    <body>

    <div class="container">
      <form action="" method="POST" id="payForm">
        <div class="row">
          <div class="column">
            <h3 class="title">Billing Info : </h3>
            <div class="input-box">
              <span>Full Name :</span>
              <input type="text" name="name" id="fullName" placeholder="Jacob Aiden" required>
            </div>
            <div class="input-box">
              <span>Email :</span>
              <input type="email" name="email" id="email" placeholder="jacobaiden@gmail.com" required>
            </div>
            <div class="input-box">
              <span>Phone Number :</span>
              <input type="text" name="phonenumber" id="phoneNumber" placeholder="(+1) 443 556 756" required>
            </div>
          </div>

          <div class="column">
            <h3 class="title">Billing</h3>
            <div class="input-box">
              <span style="margin-bottom: 0;">Upgrade For : Yearly Pro</span>
              <div style="display: flex;">
                <div>
                  <span style="font-size: 30px; color: #6a5acd; margin-top: 15px; margin-bottom: 25px; font-weight: bolder;"><strong style="position: relative;
                    font-size: 20px; top: -7px;">$</strong>190</span>
                </div>
                <div>
                  <div class="input-box">
                    <strong> <span style="font-size: 30px; font-weight: 700px; margin-top: -1px; margin-left: 150px;">USD</span> </strong>
                  </div>
                </div>
              </div>
            </div>
            <div class="input-box">
              <img src="img/pay/pay.png" alt="">
            </div>
            <div class="input-box">
              <span>Withdrawal amount :</span>
              <input type="number" name="number" id="amount" placeholder="Enter amount here..." required>
            </div>
          </div>
          <input type="submit" value="Continue" class="btn">
        </div>
      </form>
    </div>

    <script src="https://checkout.flutterwave.com/v3.js"></script>
    <script src="withdraw.js"></script>
     </body>

</html>