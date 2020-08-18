<div class="row mt-5 mb-5">
    <div class="col-6">
   <table align="center">
            <tr>
                <td class="text-center"> <b> Dumai, <?php echo Fungsi::hariini(); ?></b></td>
            </tr>
            <tr>
            </tr>
             <tr>
                <td class="text-center">
                    <p class="m-0 p-0">Dibuat Oleh</p>
                </td>
            </tr>
             <tr>
                <td class="text-center">
                    <p class="m-0 p-0"><?php echo $data['admin']->akses; ?></p>
                </td>
            </tr>


            <tr>
                <td>
                    <br>
                    <br>
                    <br>
                    <br>
                </td>
            </tr>

           <tr>
               <td>
                    <p class="m-0 p-0 text-center"><?php echo $data['admin']->nama; ?></p>
                   <hr class="m-0 p-0" class="border border-dark">


               </td>
           </tr>
        </table>
    </div>
    <div class="col-6">
        <table align="center">
            <tr>
                <td class="text-center"><br></td>
            </tr>
            <tr>
            </tr>
             <tr>
                <td class="text-center">
                    <p class="m-0 p-0">Diketahui Oleh</p>
                </td>
            </tr>
             <tr>
                <td class="text-center">
                    <p class="m-0 p-0"><?php echo $data['owner']->akses; ?></p>
                </td>
            </tr>


            <tr>
                <td>
                    <br>
                    <br>
                    <br>
                    <br>
                </td>
            </tr>

           <tr>
               <td>
                    <p class="m-0 p-0 text-center"><?php echo $data['owner']->nama; ?></p>
                   <hr class="m-0 p-0" class="border border-dark">


               </td>
           </tr>
        </table>
    </div>
</div>
