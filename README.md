F1. Authentication and authorisation are not the same. In one sentence each: what did this lesson give you, and what is still missing next meeting?
Answer:
Ang authentication ay sumasagot sa "sino ka?" — sa lesson na ito, nagkaroon ang books project ko ng accounts: register, login, logout, at ang `auth` middleware na nagche-check kung naka-sign in ang tao. Ang authorisation ay sumasagot sa "ano ang pwede mong gawin?" — ito ang kulang pa; ngayon, kahit sinong may account ay pwedeng mag-add, mag-edit, at mag-delete ng lahat ng books, at sa susunod na meeting ay roles ang idadagdag.

F2. 
Answer:
Ang session id ang paraan ng browser para manatiling naka-sign in sa bawat page. Kung alam na ng ibang tao ang session id ko bago ako mag-login, magiging signed-in session iyon pagka-login ko (session fixation), kaya kapag nilaktawan ang `regenerate()`, bukas ang atake na iyon. Ang `regenerate()` ay gumagawa ng bagong session id pagkatapos ng successful login, kaya wala nang silbi ang lumang id.

F3. Why does a failed login use the same message for a wrong password and an unknown email?
Answer:
Pareho ang message na "The provided credentials do not match our records." kahit mali ang password o hindi existing ang email. Kung sasabihin ng page na "walang ganitong email", malalaman ng sinuman kung aling email ang registered sa Libsys Portal, isa-isang hula. Ang malabong message ay sapat na para sa totoong user na i-check ang email at password, pero walang naibibigay na impormasyon sa estranghero.

F4. Why do index and show stay public while create/edit/update/destroy use auth?
Answer:
Ang books list at book details ay parang catalogue, at walang silbi ito kung kailangan pang mag-account bago makabasa. Kaya bukas ang `index` at `show` para sa lahat. Ang `create`, `store`, `edit`, `update`, at `destroy` lang ang may `auth` dahil ang mga ito ang nagbabago ng data.

F5. You hid Add (and actions) for guests. Why is that not enough to secure those actions? What actually stops a stranger?
Answer:
Ang pagtago ng button ay nagbabago lang ng itsura ng page, pero nandoon pa rin ang address, halimbawa `/books/create`, at kahit sino ay pwedeng i-type ito. Ang tunay na pumipigil sa estranghero ay ang `auth` middleware sa mga route, na nagre-redirect sa kanya sa login bago pa umabot sa controller. Napatunayan ko ito sa screenshot 19: nakatago ang Add pero nag-redirect pa rin sa login nang i-type ko ang create URL bilang guest.

F6. In screenshot 20 the route name was wrong. Why does auth middleware care that the route is named exactly login?
Answer:
Kapag may hindi naka-login na bumisita sa locked page, ang `auth` middleware ay nagre-redirect sa route na ang pangalan ay `login`. Pangalan ang hinahanap nito, hindi ang path na `/login`. Sa screenshot 20, pinalitan ko ang pangalan ng `signin` at lumabas ang "Route [login] not defined" dahil wala nang route na may pangalang `login`.
