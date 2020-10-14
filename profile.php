<?php
	session_start();
	if(isset($_SESSION['user'])){
        $user=$_SESSION['user'];
	require_once 'db.php';
?>

<?php include('head.php'); ?>

<div class="container">
    <div class="span3 well mt-4">
        <center>
            <a href="#"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAkFBMVEUAAAD////x8fESEhL8/Pz29vYPDw/5+fn09PRDQ0M+Pj5GRkbU1NTt7e1JSUkuLi67u7vj4+M3NzcpKSnY2Nhvb298fHzR0dGjo6PBwcHKysqDg4Pn5+evr69QUFBgYGC0tLScnJyPj48bGxt1dXWWlpZjY2MzMzMiIiJWV1mFh4moqKhoaWwkJSZfYWJucHKOPPg+AAAO60lEQVR4nO1d6WKyuhYFBVGqCEqZxAGFWse+/9tdqZUEhWRnQPQ7d/0757OQRYa9s0dFbRKaoRtOGHjexBwrJUzNSeoFtnv5gdHoEFSlqQf3Y8ede4ueQoO1PAyduKM1NZBGGI7caDUbULlhMNN5NIybGIt8hpprB6nJwu6GyWey8nXZ45HMUIsCb7HhoXdFz0qzSPK+lMnQXX+ZXX56t6lcrn2Jg5LHUAsWU2F2f5gO9h1Z45LF0D/KYnfDwJYzMhkMjXg+kc0vxyZxZJw7wgz7fiJwtJDRnUXiq1WQoR6tm6J3hWeLSkkhhlo4G9MHKYjjXGweRRhG6bZxfhdslvN2GMZLadKBynEXPZ+htn8WvSuWo+cy1OeNnZ+1yDg58jDUIunyHYJF2H8Swzhpg1+OGY/Cys4wbGUCrzDn7BdlVoajrHkJSEDPcxtm6O/a5JdjEDbKcE43uzSPNZs+zsKw/9U2uSsspxmGmtvqDiwhYjhwwAz11dOUNAAOcG0cynCUfbfNqgQPvFKBDEfpK5wxOJZQsQFjGC/aJvQIE0gRxFB/pS1YYAOTjBCGfttc6gCiCGAYiVt5m0IIsI/TGYZPMVVwIqNfqKgMQy4vy7OwoVOkMXxtghCKFIbRKy/RX3QDyl4kM/Rf95BBoJyoRIZu24OHgezDITGMX+cyQcaQk6FjtT1yKE4kBa6e4eiz7YHD8UG4adQy7DfsVJKLz3pzcR1DbfV8q7YAeuvaK3EdQ/cd5ASOQ51ho4Zhp+0Bs6POPVXNUBPR1TbmlmeFbyYDITvCtMZZXM0wE3lV2skD2phkac9c7udxX8zcfKxep5UMQ5EX9ZL8EY6dpBZsTqa72eE3IsEQ+rCKEoAZuh8i7xnf9MTO0M52tPVq/iShc9OdBe/a3UrXVAVD3RN6D26RNhx/ntYH2+z2oRtja8sR9IrsqqRiBUNBSfh197jOKFpX6H/dY+CM7jwQuqjrfA1i6Iqpo72s4i2aE5zxTfmxj/Sqc0FUzRhX3KQeGPZnYi/5rg2biNbmd7e3GR8PtUFAvtAJcMHXo4L6wFDoHL3AJF25oyAhmscMsSPgguzh8fcMY6bg5QqkBAJ0HES14fHDXfGeofCN4iDEMBKOckzvJ/GOobjdgsl7+QBjKTyAe5vGHUNhN/23EEEJa0iZEhmKHjOi2/AyAvFr6Z1QLDE0RI8Zmt0LAAnhxmU9osQwEXeDCsf0SogILK8jnOFIPFhmIZzcE4kzLEsMnOFB3HKxF09fkmAf8moYOuInNcxnSYaEsDkT1xwxhivxR0/FpOEvbPFhKGtsKSGGsYQpPHJH8iLoEpbpBJtExFDGt0skZGVpZwkDwQwaBcOOjKA1gYBzhLmEgUyQJ6NgKCPgwmIO/qxCLMMYvXpkKMMP40nYhhexLGM1WcVQbgxHEp5aY85jhXaQMZbC7nZjKMPTdJIgDXP4Mjyzn/cMJTxTWUjZhhfVQ8ZpWmjIfwzFr01Kbs6Xw1ATtH1fkZQZSpD2SlfMgIEhlBIpWGI4krHyt5K2objt+woXZxjIEEELCUrpFXLSxmY4QylpMKIGDAyrk4TxmDpiKOZs+kM3kcdwKG5OUZTvEDEUtsPmkCUNfyEl0mWGGAq6Kq4wZVYnkfLNl/qN4VBK8FNqdKShL0VejO0bQ/utQmcYkNwYtpYx2TQ87cowfqMANjZYwyvDYSNVLV4B3dWVoQQb7Ksi+GWoBW2PoznMOjnDkYx7xYti4OYMnZdMapKEKGf4JuHqfLBzhjIswS+Lta4qmnCAxyvjOFIV420i8nkwdS4MXyu/VzYuDHUZz+k2ASmZx66qiPsrTkuZd18EN5VgH0s0RdSEfjrajRXm9D3h3MCZpojd70/pqskCq1q0F0wPXBiKiKOnl9ry6hvWcVwL6VxjQxGwav1EUrxpFOj+XsSaqyvcFoydz1W2iQOGK7CVuGXFgqW8iDhibps1H8PvsxSHPROclM8OvuL4myblAwm+x2NuYb9YnH5WrfDLEe3ZObLK+03z8oGEi3xk1XMYD6k0fIZ8IEH312ynP9Pl8Oy3OX836C6Td5GB4ZPlAwnOj3yGm+Xz5QMJzg90rcIc5tOvZu5HIhgCZQfkdnL6bEf+0RDNIKOn/6Zl+UAC6G5FZdi+fCBBj/Y0XY7C8CihYniz0IcU2UFkeJYUp9YwRkSOrZcjbRz/tMH7F/9n+P6QEiv00pASUv3S+Kedh79YSXpO7w+v9zABe+kfNpNdZt9Ug/5w7n2M+YfWG3948+HNDuva2W4iOj5dxOat5H22ggfFJ8rOfE6j0zJ7uIW6waeYd0YX8ltY6+p7/8j22I2bJ8+uVPK1KBNwU48NEXmxd2v9Tp2QNWfiHNYq+QabZaaEhcEvL8yI6LeIAxb3+XdAbAnUj3iXaqpx+4BTWpciLYJv8QHVyhWnfMPMNF7fDK1qaA5wPBmkiYzBF37ncsZibAKQ5aYD8xgdQddsLeARHA5fPM3mPv+nHzu/GN3PLMSwubyfrdH1YfH9Pl+xT0YeT8MTE1VO9+379vpsTi6wfpKwLB4B2ZJf5SXqhsmPlT/MPK/tshPWYA/XzmOiOOLaSmUFtLAUMNHbJSWODq1efTmXyE12uEZkemHpXcxSI49rY49NNPEP63sPBj0rw4/ZkCz7S3ko8aNs33p4EbY+q9CwueJLsaoTxqHqlb0zNipKMmGGzZG/q9JoB3NsTwwZxxrxxAjv0fs6sxole4P1giOm2u2wNVrXB6w3w85atnV6jRFmjPO20OtGhJMSO23t+kUyxcrZEJSrH3QYdZiO/mucN2OsPuop1SeqGWgWCVIRk4TEOgNpsfU1pnoE11h9tnwL7Ogjn90TtBdr07SwxUwp8oXy4B2GTMJbvgVTzgyq+EZTaD+LE3VUN6iPYvXR4mVQWUuWEqC3nBmWvKdpcbhrNHN5D333uhvarPhFQLML7IrNwZDWdst7YsldQ2efTQ02Q7+ty4UvPhc9tblrw39bIFFV5vzDolIYpHQc2mX5f33/BGH/L7sw+PlVMYt/Bxwfy2J7gMs/oPxDeA7pd1EyxAaYKc7FTvwxk/tEbycxf4pdCJgWVLgTrICjHFJ4TqpZbHjIh+wV2k91Hnvxf4cQ61yxfHyo6oblAYNzuQtZMQLd/ID9GGEyrqjQRFXm/4DncoPz8b9umwG2dT1YHz9Y4WLrtiIMoHkQz8cH11QoSqLAGggtYDG2fdCkoI0IlN+lmgrQuhgFQ8hBc1F8YVEAHZDJ6lTICyDDUl0MaG2TojDEOzBUSwyB9WneiWFSZgisMSSySo3OMDl+WJb1cUyGHdzS0wzDuxpDQEUBnTSgjbtADHU/w8WYmfnonO00cdI81ImC1foq2g/ApEVasIj29/rydF/4mXSQPbuQFhpItj3U+oJ9mEKZhtVUK/qGOFVTPr49DFa+rLA6glTvx3ptsJp7AyatDX3HagoHpncjrQ2ybStq7oHqJp6Q5g24pSF7QLVBh0nzRq+GFCCqqpsIswwXbQEgeghyblSrTN3bP0OMYUg/glzyq2pfwuqXnotpoTewRgXq6mxdxVnjUr9Xr7hsQurVVdcvVVf0v1TGxZ9q1NM0KZ5cZ+REpleqIcUq1kMEEFTVNWhhdYQT9CbKJKLp7td9DKtYebSJ6aEvC7Aq1dURBtWCxqyJ5P2wRW+pvZTj1kTyZQW1BYHIirpa0LB63ijriez/RHudYDn+RNcr4mGDLMfaij7E+nreoJrsO6SJOQSKaDWTNDysawpp9R3RwukAZqG+Jjusrn6Cfl9PEWs2QzT2HjFHXO2qxwiCbLuEuvqwSxTe7SioFPwWvtPJsg4vWxtVnkhjPCjCAYyP1BsB1t/Cwu1L4fLhGJnMcNMa5XAf4x/DmT14L75L5QzoIorW3wLmEC59JGN1xIfVs2alzlkxTT6fS3E5/qzUymxyLKf7Q7RhSo8SmB10XnptJwq83WS7nW4H5/18WLIgdugXo7QUqaAN5/vzYLs9bSc7Lyine2h0PYreZwbWK2h8/506ju/7kT907s2HkJvf7O5vdGeYP8x37m0gEJWb3isIdthsYbZeYHesGcjoqM0hdgV6vyfgqLqr+7+rAOzuruC2AAJWEJsupGcXtO/anjoq+oWhAL1ONqzpHKjvGri928AhBu915ixBtKc50fBoOLA4R1jvPHj/w8Sp3Y26z1rm4ejXLgrNAXqpof0P4a6o3WFYybETrdkjvcfrmlTAYQD0+oJ7WDJUaO9Z+9XD3vYPKV/ZnEl6eBijs9qDgy/gfUiZesmeFmkQ3Vj2XTv7GvCXk+kOvjLbvQkPJwrSBXw3s/SSZewHvLloMx+/MLcn0TyQ3mlrXh822E5ZYmbZ+gH/+z2d/wN9ud+vt3qt5lfHUO3L6FryNHzWR/vXMlRHb1Qi+oPQlqGeoeq8TVXME0mtJTBUYxl9PZ6BhzshlOG7FOAl980kMlT9d5AZlMoyZIY0Y/sLoEvLwKIwVEPh+prNYpPRTCA0hi9OkU6QzhAYwtYS6AQBDNXodY+bEGDCAjCU0hqxEYDqc0EYqvpLlt7fwAqQgRiqMdww+DSYwApIMIbqKJVTw0EeltAST0CG6ih7rdrtHrjJG5Shqq9eaTMe4DXIwAxVzX2dqwZLkUo4w8u1X0aTVwmwmNoQsjCEhHo9AWtYjgMfQ9VvvcDbgLUMJyPDy5na6m7secx1AFkZXjRxKQ0v+WAC84zEGKpxa53oZpXOJfkMVS1qZRoXIVchfx6GF/FflzvfIDLOQqp8DGU1tIUDUsJGLsM8avppatz3TqASNT/Dy+Wf09fLiM2SbBBtkKGqhbPmpeORHKbRLMO8VHHDLirPplXcaphhXmEoaexc7c4kVGoWZqiqRjxvpJPpJnkIBOSBBIY5mAOEqBgIHS8YJDHMM3sW0qTHdLCWV0dcGsML3PWXKW49nizXPOpnLWQyzDXWwFsIHDw9K80iyW3O5DJUc3OOHaRc3pzJZ7KqD9/jhnSGOUZutJoxlX4103k0FJV81WiEYY5+7Lhzb0E37FjLw9CJO4210GiM4S80QzecMPC8iXmn3k3NSeoFtnv5QZPtBS/4H6QmAJwJCdvyAAAAAElFTkSuQmCC" name="aboutme" width="140" height="140" class="img-circle"></a>
            <h3> <?php echo $user['Full_Name'] ?> </h3>
            <p>Email: <?php echo $user['Email'] ?></p>
            <a href="write_post.php" class="btn btn-black">Write a post</a>
            <a href="edit_profile.php" class="btn btn-black">Edit a profile</a>
		</center>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="offer d-flex mt-4 justify-content-center">
                <div class="offer__title">
                    <h2>My posts</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <?php
            $posts = getPosts();
            foreach ($posts as $ps) {
                if($ps['User_Id'] == $user['ID']){
        ?>
        <div class="col-lg-4">
            <div class="card text-center mt-4">
                <div class="card-header">
                    <p class="card-text"> by <a href="#"><?php echo $user['Full_Name']?></a></p>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $ps['Title'] ?></h5>
                    <p class="card-text"><?php echo $ps['Description'] ?></p>
                    <a href="single_blog.php?id=<?php echo $ps['ID'] ?>" class="btn btn-primary">Read more</a>
                </div>
                <div class="card-footer text-muted">
                    <?php echo $ps['Publish_date'] ?>
                </div>
            </div>
        </div>
        <?php
            }
        }
        ?>
    </div>
</div>

<?php }
else{
	header('Location:signin.php');
	}
?>