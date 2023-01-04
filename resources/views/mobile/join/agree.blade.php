@include('/mobile/common/start')
@include('/mobile/common/header',[
    "isShowBackButton" => false,
    "isShowCloseButton" => true,
    "title" => "회원가입"
])
<script>
    function pageClose(){
        location.href = '/';
    }
</script>
<section id="container" class="page-body">
    <div class="page-contents page-write">
        <div class="join-wrap">
            <div class="point-title">이용약관에 동의해주세요.</div>
            <div class="join-agree-all" onclick="allAgree()">
                <label class="form-checkbox">
                    <input id="allChecked" type="checkbox" class="check-agree-checkbox">
                    <span class="form-check-icon">
                        <em>
                            <strong>이용약관에 모두 동의합니다.</strong>
                        </em>
                    </span>
                </label>
            </div>
            <div class="join-agree-data">
                <div class="join-agree-check" onclick="checked('usedAgree')">
                    <label class="form-checkbox">
                        <input class="check-agree-checkbox" type="checkbox" id="usedAgree">
                        <span class="form-check-icon">
                            <em>
                                <strong>마음팔레트 이용 약관<span class="need">*</span></strong>
                            </em>
                        </span>
                    </label>
                </div>
                <!-- 20221226 수정  -->
                <div class="join-agree-detail normal">
                    <div class="terms-wrap">
                        <div class="terms-group">
                            <h3>[제1장 총칙]<br><br></h3>
                        </div>
                        <div class="terms-group">
                            <h3>제1조 (목적)</h3>
                            <div class="terms-sentence">
                                이 약관은 “다섯달란트”(이하 “회사”)가 마음그림 (maeumpalette.com/ , m.maeumpalette.com/)서비스 (이하 “서비스”)의 이용조건, 절차 및 기타 필요한 사항을 규정함을 목적으로 합니다.
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제2조 (약관의 효력 및 변경)</h3>
                            <div class="terms-sentence">
                                <div class="text-list">
                                    <div class="text-list-item">이 약관은 서비스를 통하여 이를 공지하거나 전자우편, 기타의 방법으로 회원에게 통지함으로써 효력을 발생합니다.</div>
                                    <div class="text-list-item">회사는 이 약관의 내용을 변경할 수 있으며, 변경된 약관은 제1항과 같은 방법으로 공지 또는 통지함으로써 효력을 발생합니다.</div>
                                    <div class="text-list-item">회원은 신설 또는 변경된 약관에 동의하지 않을 경우 회원탈퇴를 요청할 수 있으며, 신설 또는 변경된 약관의 효력발생일 이후에도 서비스를 계속 사용할 경우 약관의 변경사항에 동의한 것으로 간주됩니다.</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제3조 (용어의 정의)</h3>
                            <div class="terms-sentence">
                                이 약관에서 사용하는 용어의 정의는 다음과 같습니다.
                                <div class="text-list">
                                    <div class="text-list-item">회원 : 회사와 서비스 이용에 관한 계약을 체결한 자</div>
                                    <div class="text-list-item">비회원 : 회원이 아니면서 회사가 제공하는 서비스를 이용하는 자</div>
                                    <div class="text-list-item">상담사 : 회원이면서 회사가 제공하는 서비스에서 전문 상담사로 활동하는 자</div>
                                    <div class="text-list-item">이용자 : 회사의 사이트에 접속하여 이 약관에 따라 회사가 제공하는 제반 서비스 등을 이용하는 회원 및 비회원</div>
                                    <div class="text-list-item">콘텐츠 : 정보통신망이용촉진 및 정보보호 등에 관한 법률 제2조 제1항 제1호의 규정에 의한 정보통신망에서 사용되는 부호·문자·음성·음향·이미지 또는 영상 등으로 표현된 자료 또는 정보로서, 그 보존 및 이용에 있어서 효용을 높일 수 있도록 전자적 형태로 제작 또는 처리된 것</div>
                                    <div class="text-list-item">아이디(ID) : 회원 식별과 회원의 서비스 이용을 위하여 회원이 선정한 이메일 주소</div>
                                    <div class="text-list-item">비밀번호 : 회원이 통신상의 자신의 비밀을 보호하기 위해 선정한 문자와 숫자의 조합</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제4조 (회사정보 등의 제공)</h3>
                            <div class="terms-sentence">
                                회사는 다음 각 호의 사항을 회원이 알아보기 쉽도록 서비스 내에 표시합니다.<br>
                                다만, 개인정보처리방침과 약관은 회원이 연결화면을 통하여 볼 수 있도록 할 수 있습니다.
                                <div class="text-list">
                                    <div class="text-list-item">상호 및 대표자의 성명</div>
                                    <div class="text-list-item">영업소 소재지 주소(회원의 불만을 처리할 수 있는 곳의 주소를 포함한다)</div>
                                    <div class="text-list-item">전화번호, 전자우편주소</div>
                                    <div class="text-list-item">사업자 등록번호</div>
                                    <div class="text-list-item">통신판매업 신고번호</div>
                                    <div class="text-list-item">개인정보처리방침</div>
                                    <div class="text-list-item">서비스 이용약관</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제5조 (약관 이외의 준칙)</h3>
                            <div class="terms-sentence">
                                이 약관에 명시되지 않은 사항이 전기통신기본법, 전기통신사업법, 기타 관련법령에 규정되어 있는 경우 그 규정에 따릅니다.
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3><br>[제2장 서비스 회원가입]<br></h3>
                        </div>
                        <div class="terms-group">
                            <h3>제6조 (이용계약의 성립)</h3>
                            <div class="terms-sentence">
                                <div class="text-list">
                                    <div class="text-list-item">서비스 가입 신청시 본 약관을 읽고 “동의합니다”의 버튼을 클릭하면 본 약관에 동의하는 것으로 간주됩니다.</div>
                                    <div class="text-list-item">이용계약은 서비스이용신청자의 이용신청에 대하여 회사가 승낙을 함으로써 성립합니다.</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제7조 (회원가입)</h3>
                            <div class="terms-sentence">
                                <div class="text-list">
                                    <div class="text-list-item">회원 가입시 서비스에 다음 사항을 기재해야 합니다.<br>① 이메일 주소<br>② 비밀번호<br>③ 이름<br>④ 휴대전화<br>⑤ 기타 회사가 필요하다고 인정하는 사항</div>
                                    <div class="text-list-item">회사는 상기 이용자의 신청에 대하여 회원가입을 승낙함을 원칙으로 합니다. 다만, 회사는 다음 각 호에 해당하는 신청에 대하여는 승낙을 제한할 수 있고, 그 사유가 해소될 때까지 승낙을 유보할 수 있습니다.<br>① 가입신청자가 이 약관에 의하여 이전에 회원자격을 상실한 적이 있는 경우<br>② 실명이 아니거나 타인의 명의를 이용한 경우<br>③ 허위의 정보를 기재하거나, 회사가 제시하는 내용을 기재하지 않은 경우<br>④ 이용자의 귀책사유로 인하여 승인이 불가능하거나 기타 규정한 제반 사항을 위반하며 신청하는 경우<br>⑤ 서비스 관련 설비의 용량이 부족한 경우<br>⑥ 기술상 장애사유가 있는 경우<br>⑦ 기타 회사가 필요하다고 인정되는 경우</div>
                                    <div class="text-list-item">회원가입계약의 성립 시기는 회사의 승낙이 이용자에게 도달한 시점으로 합니다.</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제8조 (미성년자의 회원가입에 관한 특칙)</h3>
                            <div class="terms-sentence">
                                회사는 14세 미만 이용자에 대하여는 가입을 취소 또는 불허합니다.
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제9조 (회원정보의 변경)</h3>
                            <div class="terms-sentence">
                                <div class="text-list">
                                    <div class="text-list-item">회원은 개인정보관리화면을 통하여 언제든지 자신의 개인정보를 열람하고 수정할 수 있습니다.</div>
                                    <div class="text-list-item">회원은 회원가입신청 시 기재한 사항이 변경되었을 경우 온라인으로 수정을 하거나 전자우편 기타 방법으로 회사에 대하여 그 변경사항을 알려야 합니다.</div>
                                    <div class="text-list-item">제2항의 변경사항을 회사에 알리지 않아 발생한 불이익에 대하여 회사는 책임지지 않습니다.</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제10조 (회원에 대한 통지)</h3>
                            <div class="terms-sentence">
                                <div class="text-list">
                                    <div class="text-list-item">회사가 회원에 대한 통지를 하는 경우 회원이 지정한 이메일, 휴대전화로 할 수 있습니다.</div>
                                    <div class="text-list-item">회사는 회원 전체에 대한 통지의 경우 7일 이상 회사의 공지사항 게시판에 게시함으로써 제1항의 통지에 갈음할 수 있습니다. 다만, 회원 본인의 거래와 관련하여 중대한 영향을 미치는 사항에 대하여는 제1항의 통지를 합니다.</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제11조 (회원탈퇴 및 자격 상실 등)</h3>
                            <div class="terms-sentence">
                                <div class="text-list">
                                    <div class="text-list-item">회원은 회사에 언제든지 탈퇴를 요청할 수 있으며 회사는 즉시 회원탈퇴를 처리합니다.</div>
                                    <div class="text-list-item">회원이 다음 각호의 사유에 해당하는 경우, 회사는 회원자격을 제한 및 정지시킬 수 있습니다.<br>① 가입신청 시에 허위내용을 등록한 경우<br>② 회사의 서비스 이용 대금, 기타 회사의 서비스이용에 관련하여 회원이 부담하는 채무를 기일에 이행하지 않는 경우<br>③ 다른 사람의 회사의 서비스이용을 방해하거나 그 정보를 도용하는 등 전자상거래 질서를 위협하는 경우<br>④ 회사를 이용하여 법령 또는 이 약관이 금지하거나 공서양속에 반하는 행위를 하는 경우</div>
                                    <div class="text-list-item">회사가 회원자격을 제한·정지시킨 후, 동일한 행위가 2회 이상 반복되거나 30일 이내에 그 사유가 시정되지 아니하는 경우 회사는 회원자격을 상실시킬 수 있습니다.</div>
                                    <div class="text-list-item">회사가 회원자격을 상실시키는 경우에는 회원등록을 말소합니다. 이 경우 회원에게 이를 통지하고, 회원등록 말소 전에 최소한 30일 이상의 기간을 정하여 소명할 기회를 부여합니다.</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3><br>[제3장 서비스 제공 및 이용]<br></h3>
                        </div>
                        <div class="terms-group">
                            <h3>제12조 (서비스의 내용 및 이용)</h3>
                            <div class="terms-sentence">
                                <div class="text-list">
                                    <div class="text-list-item">회사가 제공하는 서비스의 내용은 다음과 같습니다. (서비스 리스트)<br>① 아이 그림 분석(HTP) 서비스<br>② 회원과 상담사의 상담 연계 서비스<br>③ 아이 심리 상담 서비스<br>④ 알리미 서비스<br>⑤ 기타 회사가 자체적으로 개발하거나 타사와의 협력 관계, 계약 등을 통해 회원에게 제공할 일체의서비스</div>
                                    <div class="text-list-item">회사는 필요한 경우 서비스의 내용을 추가 또는 변경할 수 있습니다. 이 경우 회사는 추가 또는 변경내용을 본 약관 제10조에 따라 회원에게 통지합니다.</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제13조 (서비스의 요금)</h3>
                            <div class="terms-sentence">
                                회사가 제공하는 서비스는 기본적으로 무료입니다.<br>
                                단, 회사에서 정한 별도의 유료 정보와 유료 상담 서비스에 대해서는 그러하지 아니합니다.
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제14조 (서비스의 개시)</h3>
                            <div class="terms-sentence">
                                서비스는 회사가 제7조에 따라서 이용신청을 승낙한 때로부터 즉시 개시됩니다. 다만, 회사의 업무상 또는 기술상의 장애로 인하여 서비스를 즉시 개시하지 못하는 경우 회사는 회원에게 이를 통지합니다.
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제15조 (서비스 이용시간)</h3>
                            <div class="terms-sentence">
                                <div class="text-list">
                                    <div class="text-list-item">서비스는 회사의 업무상 또는 기술상 장애, 기타 특별한 사유가 없는 한 연중무휴, 1일 24시간 이용할 수 있습니다. 다만 설비의 점검 등 회사가 필요한 경우 또는 설비의 장애, 서비스 이용의 폭주 등 불가항력 사항으로 인하여 서비스 이용에 지장이 있는 경우 예외적으로 서비스 이용의 전부 또는 일부에 대하여 제한할 수 있습니다.</div>
                                    <div class="text-list-item">회사는 제공하는 서비스 중 일부에 대한 서비스이용시간을 별도로 정할 수 있으며, 이 경우 그 이용시간을 사전에 회원에게 공지 또는 통지합니다.</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제16조 (정보의 제공 및 광고의 게재)</h3>
                            <div class="terms-sentence">
                                <div class="text-list">
                                    <div class="text-list-item">회사는 서비스를 운용함에 있어서 각종 정보를 서비스에 게재하는 방법 등으로 회원에게 제공할 수 있습니다.</div>
                                    <div class="text-list-item">회사는 서비스의 운용과 관련하여 서비스 화면, 전자우편 등에 광고 등을 게재할 수 있습니다.</div>
                                    <div class="text-list-item">본 서비스의 회원은 서비스 이용 시 노출되는 광고게재에 대해 동의하는 것으로 간주됩니다.</div>
                                    <div class="text-list-item">회사는 서비스 상에 게재되어 있거나 본 서비스를 통한 광고주의 판촉활동에 회원이 참여하거나 교신 또는 거래를 함으로써 발생하는 모든 손실과 손해에 대해 책임을 지지 않습니다.</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제17조 (서비스 제공의 중지)</h3>
                            <div class="terms-sentence">
                                <div class="text-list">
                                    <div class="text-list-item">회사는 다음 각 호에 해당하는 경우 서비스의 제공을 완전히 중지할 수 있습니다.<br>① 설비의 보수 등을 위하여 부득이한 경우<br>② 전기통신사업법에 규정된 기간통신사업자가 전기통신서비스를 중지하는 경우<br>③ 기타 회사가 서비스를 제공할 수 없는 사유가 발생한 경우.<br>④ 회사는 국가비상사태, 정전, 서비스 설비의 장애 또는 서비스 이용의 폭주 등으로 정상적인 서비스 이용에 지장이 있는 경우 서비스의 전부 또는 일부를 제한하거나 중지할 수 있습니다.</div>
                                    <div class="text-list-item">회사가 통제할 수 없는 사유로 인한 서비스의 중단(시스템 관리자의 고의 및 과실이 없는 디스크 장애, 시스템 다운 등)으로 인하여 사전 통지가 불가능한 경우에는 이용자에게 사전 통지하지 않아 회원에게 발생한 책임을 지지 않습니다.</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3><br>[제4장 서비스와 관련한 권리 및 의무 관계]<br></h3>
                        </div>
                        <div class="terms-group">
                            <h3>제18조 (회사의 의무)</h3>
                            <div class="terms-sentence">
                                <div class="text-list">
                                    <div class="text-list-item">회사는 제15조 및 제17조에서 정한 경우를 제외하고 이 약관에서 정한 바에 따라 계속적, 안정적으로 서비스를 제공할 수 있도록 최선의 노력을 다하여야 합니다.</div>
                                    <div class="text-list-item">회사는 서비스에 관련된 설비를 항상 운용할 수 있는 상태로 유지 보수하고, 장애가 발생하는 경우 지체 없이 이를 수리, 복구할 수 있도록 최선의 노력을 다하여야 합니다.</div>
                                    <div class="text-list-item">회사는 서비스와 관련한 회원의 불만사항이 접수되는 경우 이를 즉시 처리하여야 하며, 즉시 처리가 곤란한 경우 그 사유와 처리 일정을 서비스 또는 전자우편을 통하여 동 회원에게 통지하여야 합니다.</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제18조의2 (보안상 긴급상황)</h3>
                            <div class="terms-sentence">
                                <div class="text-list">
                                    <div class="text-list-item">보안상 심각하고 시급을 요하는 프로그램 결함이나 장애 혹은 그에 준하는 사건발생 시, 회사에서 고객의 해당 부분을 일괄적으로 패치를 할 수 있습니다.</div>
                                    <div class="text-list-item">보안상 심각하고 시급을 요하는 경우 회사에서 고객의 인증관련 정보를 응급 변경할 수 있읍니다.</div>
                                    <div class="text-list-item">본조 제①, ②항의 긴급상황 대처 전 회사는 공지나 이메일을 통하여 고객에게 이를 알려야 합니다. 만약 상황이 긴급하여 이를 알리기에 어려움이 있다면, 회사는 대처 후라도 이를 공지나 이메일을 통하여 알려야 합니다.</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제19조 (개인정보의 보호)</h3>
                            <div class="terms-sentence">
                                <div class="text-list">
                                    <div class="text-list-item">회사는 관련법령이 정하는 바에 따라서 서비스와 관련하여 기득한 회원의 개인정보를 보호하기 위해서 노력합니다. 회원의 개인정보 보호에 관해서는 관련법령 및 회사가 정하는 “개인정보 보호정책”에 정한 바에 의합니다.</div>
                                    <div class="text-list-item">회사는 만 14세 미만의 아동이 가입을 원할 경우 개인정보보호지침 및 개인정보 보호정책에 의거 회원의 개인 정보를 수집하지 않습니다.</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제20조 (회원의 의무)</h3>
                            <div class="terms-sentence">
                                <div class="text-list">
                                    <div class="text-list-item">회원은 관계법령, 이 약관의 규정, 이용안내 및 주의사항 등 회사가 통지하는 사항을 준수하여야 하며, 기타 회사의 업무에 방해되는 행위를 하여서는 아니 됩니다.</div>
                                    <div class="text-list-item">회원은 회사의 사전승낙 없이는 서비스를 이용하여 영업활동을 할 수 없으며, 그 영업활동의 결과와 회원이 약관에 위반한 영업활동을 하여 발생한 결과에 대하여 회사는 책임을 지지 않습니다. 회원은 이와 같은 영업활동으로 회사가 손해를 입은 경우 회원은 회사에 대하여 손해배상의무를 집니다.</div>
                                    <div class="text-list-item">회원은 서비스를 이용하여 얻은 정보를 회사의 사전 승낙 없이 복사, 복제, 변경, 번역, 출판, 방송, 기타의 방법으로 사용하거나 이를 타인에게 제공할 수 없습니다.</div>
                                    <div class="text-list-item">회원은 이용신청서의 기재내용 중 변경된 내용이 있는 경우 서비스를 통하여 그 내용을 회사에 통지하여야 합니다.</div>
                                    <div class="text-list-item">회원은 서비스 이용과 관련하여 다음 각 호의 행위를 하여서는 아니 됩니다.<br>① 다른 회원의 아이디(ID)를 부정사용하는 행위<br>② 범죄행위를 목적으로 하거나 기타 범죄행위와 관련된 행위<br>③ 선량한 풍속, 기타 사회질서를 해하는 행위<br>④ 타인의 명예를 훼손하거나 모욕하는 행위<br>⑤ 타인의 지적재산권 등의 권리를 침해하는 행위<br>⑥ 타인에 대한 개인정보를 수집 또는 저장하는 행위<br>⑦ 스토킹(stalking) 등 타인을 괴롭히는 행위<br>⑧ 해킹행위 또는 컴퓨터바이러스의 유포행위<br>⑨ 타인의 의사에 반하여 광고성 정보 등 일정한 내용을 지속적으로 전송하는 행위<br>⑩ 불특정 다수를 대상으로 하여 광고, 선전의 게시 등 영리를 목적으로 하는 행위<br>⑪ 서비스의 안정적인 운영에 지장을 주거나 줄 우려가 있는 일체의 행위<br>⑫ 관계법령에 위배되는 행위<br>⑬ 기타 회사가 서비스 운영상 부적절하다고 판단하는 행위</div>
                                    <div class="text-list-item">회사가 관계법령 및 “개인정보보호정책”에 의하여 그 책임을 지는 경우를 제외하고, 회원에게 부여된 ID의 비밀번호의 관리 소홀, 부정 사용에 의하여 발생하는 모든 결과에 대한 책임은 회원에게 있습니다.</div>
                                    <div class="text-list-item">회원은 자신의 ID나 비밀번호가 부정하게 사용되었다는 사실을 발견한 경우에는 즉시 회사에 신고하여야 하며, 회사의 안내가 있는 경우에는 그에 따라야 합니다. 이를 따르지 않는 경우 이에 따른 모든 결과의 책임은 회원에게 있습니다.</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제21조 (게시물 또는 내용물의 삭제)</h3>
                            <div class="terms-sentence">
                                회사는 회원이 게시하거나 등록하는 서비스 내의 내용물 등이 제20조의 규정에 위반되거나 회사 소정의 게시기간을 초과하는 경우 사전 통지나 동의 없이 이를 삭제할 수 있습니다.
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제22조 (회원의 아이디(ID) 및 비밀번호에 대한 의무)</h3>
                            <div class="terms-sentence">
                                <div class="text-list">
                                    <div class="text-list-item">회원은 서비스를 이용하는 경우 아이디(ID) 및 비밀번호를 사용해야 합니다.</div>
                                    <div class="text-list-item">아이디(ID) 및 비밀번호에 대한 모든 관리의 책임은 회원에게 있습니다.</div>
                                    <div class="text-list-item">회원은 아이디(ID) 및 비밀번호를 제3자에게 이용하게 해서는 안됩니다.</div>
                                    <div class="text-list-item">아이디(ID) 및 비밀번호의 관리상 불충분, 사용상의 과실, 제3자의 사용 등에 의한 손해의 책임은 회원이 집니다.</div>
                                    <div class="text-list-item">회원은 아이디(ID) 및 비밀번호를 도난당하거나 제3자에게 사용되고 있음을 인지한 경우에는 바로 회사에 통보하고 회사의 지시가 있는 경우에는 그에 따라야 합니다.</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3><br>[제 5 장 기 타]<br></h3>
                        </div>
                        <div class="terms-group">
                            <h3>제23조 (저작권의 귀속 및 이용제한)</h3>
                            <div class="terms-sentence">
                                <div class="text-list">
                                    <div class="text-list-item">회사가 작성한 서비스에 관한 저작권 및 기타 지적재산권은 회사에 귀속됩니다.</div>
                                    <div class="text-list-item">회원은 서비스를 이용함으로써 얻은 정보를 회사의 사전 승낙 없이 복제, 송신, 출판, 배포, 방송 기타 방법에 의하여 영리목적으로 이용하거나, 제 3자에게 이용하게 하여서는 안됩니다. (단, 회원이 사적으로 이용하는 경우는 그러하지 아니합니다.)</div>
                                    <div class="text-list-item">회원이 작성한 게시물에 대한 모든 권리 및 책임은 이를 게시한 회원에게 있습니다. 단, 회원이 회사에제공한 공개적인 게시물에 대한 권리는 회사와 개인이 공동으로 소유합니다.</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제24조 (양도금지)</h3>
                            <div class="terms-sentence">
                                회원이 서비스의 이용권한, 기타 이용계약상 지위를 타인에게 양도, 증여할 수 없으며, 이를 담보로 제공할 수 없습니다.
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제25조 (손해배상)</h3>
                            <div class="terms-sentence">
                                회사는 서비스에서 무료로 제공하는 서비스의 이용과 관련하여 개인정보보호정책에서 정하는 내용에 해당하지 않는 사항에 대하여 어떠한 손해도 책임을 지지 않습니다.
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제26조 (면책)</h3>
                            <div class="terms-sentence">
                                <div class="text-list">
                                    <div class="text-list-item">회사는 회원이 서비스에 게재한 정보, 자료, 사실의 정확성, 신뢰성 등 그 내용에 관하여는 어떠한 책임을 부담하지 아니하고, 회원은 자기의 책임아래 서비스를 이용하며, 서비스를 이용하여 게시 또는 전송한 자료 등에 관하여 손해가 발생하거나 자료의 취사선택, 기타 서비스 이용과 관련하여 어떠한 불이익이 발생하더라도 이에 대한 모든 책임은 회원에게 있습니다.</div>
                                    <div class="text-list-item">회사가 제공하는 정보와 자료는 거래의 목적으로 이용될 수 없습니다. 따라서 본 서비스의 정보와 자료 등에 근거한 거래는 전적으로 회원자신의 책임과 판단아래 수행되는 것이며, 회사는 회원이 서비스의 이용과 관련하여 기대하는 이익에 관하여 책임을 부담하지 않습니다.</div>
                                    <div class="text-list-item">회원 아이디(ID)와 비밀번호의 관리 및 이용상의 부주의로 인하여 발생되는 손해 또는 제3자에 의한 부정사용 등에 대한 책임은 모두 회원에게 있습니다.</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제27조 (분쟁의 해결)</h3>
                            <div class="terms-sentence">
                                회사와 회원은 서비스와 관련하여 발생한 분쟁을 원만하게 해결하기 위하여 필요한 모든 노력을 하여야 합니다.<br>
                                제1항의 규정에도 불구하고, 동 분쟁으로 인하여 소송이 제기될 경우 동 소송은 회사의 본사소재지를 관할하는 법원의 관할로 합니다.
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3><br>부칙<br><br></h3>
                            <div class="terms-sentence">
                                제1조 (시행일)<br>
                                이 약관은 2022년 12월 27일부터 적용합니다.
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //20221226 수정 -->
            </div>
            <div class="join-agree-data">
                <div class="join-agree-check" onclick="checked('userInfoAgree')">
                    <label class="form-checkbox">
                        <input class="check-agree-checkbox" id="userInfoAgree" type="checkbox">
                        <span class="form-check-icon">
                            <em>
                                <strong>개인정보 수집 및 이용<span class="need">*</span></strong>
                            </em>
                        </span>
                    </label>
                </div>
                <!-- 20221226 수정 -->
                <div class="join-agree-detail normal">
                    <div class="terms-wrap">
                        <div class="terms-group">
                            <div class="terms-sentence">
                                &lt; 다섯달란트 &gt;('maeumpalette.com'이하 '인천 마음팔레트')은(는) 「개인정보 보호법」 제30조에 따라 정보주체의 개인정보를 보호하고 이와 관련한 고충을 신속하고 원활하게 처리할 수 있도록 하기 위하여 다음과 같이 개인정보 처리방침을 수립·공개합니다.
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제1조 (개인정보 수집에 대한 동의)</h3>
                            <div class="terms-sentence">
                                다섯달란트는 이용자에서 개인정보처리방침 또는 이용약관의 내용에 「동의한다」또는「동의하지 않는다」 버튼을 클릭할 수 있는 절차를 마련하고 있으며, 「동의한다」 버튼을 클릭하면 개인정보 수집 에 동의한 것으로 봅니다.
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제2조 (개인정보 수집 항목)</h3>
                            <div class="terms-sentence">
                                <div class="text-list">
                                    <div class="text-list-item">다섯달란트는 기본적인 서비스 제공을 위한 필수 정보만을 수집하고 있으며 고객 각각의 기호와 필요에 맞는 서비스를 제공하기 위하여 정보 수집 때 별도 동의를 얻고 있습니다. 선택 정보를 입력하지 않아도 서비스 이용에 제한은 없습니다.</div>
                                    <div class="text-list-item">다섯달란트는 이용자의 기본적 인권을 침해 할 우려가 있는 민감한 개인정보(인종 및 민족, 사상 및 신조, 출신지 및 본적지, 정치적 성향 및 범죄기록, 건강상태 및 성생활 등)는 수집하지 않습니다. 그리고, 어떤 경우에라도 입력하신 정보를 이용자들에게 미리 밝힌 목적 이외의 다른 목적으로는 사용하지 않으며 외부로 유출하지 않습니다.</div>
                                    <div class="text-list-item">다섯달란트는 다음과 같이 개인정보를 수집하여 이용합니다.</div>
                                </div>
                            </div>
                            <table class="terms-table">
                                <colgroup>
                                    <col style="width:25%"/>
                                    <col style="width:25%"/>
                                    <col style="width:25%"/>
                                    <col style="width:25%"/>
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>유형</th>
                                    <th>구분</th>
                                    <th>수집·이용항목</th>
                                    <th>수집·이용목적</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td rowspan="3">필수</td>
                                    <td>회원 공통</td>
                                    <td>이메일 주소, 비밀번호, 이름, 휴대전화</td>
                                    <td rowspan="3">이용자 식별, 계약이행을 위한 연락, 서비스 이용에 따른 정보 제공(고지사항 전달, 본인의사 확인, 서비스 관련 상담, 민원사항 처리, 유의사항 등), 서비스 이용 만족도 조사 등</td>
                                </tr>
                                <tr>
                                    <td>상담사</td>
                                    <td>학력사항</td>
                                </tr>
                                <tr>
                                    <td>HTP 신청회원</td>
                                    <td>이름, 아이와의 관계, 연락처, 거주지, 아이이름,생년월일</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">선택</td>
                                    <td>회원</td>
                                    <td>-</td>
                                    <td rowspan="2">상담 매칭 서비스를 위한 조사</td>
                                </tr>
                                <tr>
                                    <td>상담사</td>
                                    <td>자격사항, 경력사항</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="terms-group">
                            <h3>제3조 (개인정보의 수집 방법)</h3>
                            <div class="terms-sentence">
                                다섯달란트는 개인정보를 사이트 회원가입 절차, 상담절차, 이벤트나 경품 행사, 영업업무 위탁사 또는 제휴사 등의 방법으로 수집하며 이동 전화 및 유-무선 인터넷 서비스를 사용할 때 생성정보 수집 도구를 통한 방법(쿠키) 등으로도 개인정보를 수집합니다.
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제4조 (개인정보의 처리 및 보유 기간)</h3>
                            <div class="terms-sentence">
                                <div class="text-list">
                                    <div class="text-list-item">&lt; 다섯달란트 &gt;은(는) 법령에 따른 개인정보 보유·이용기간 또는 정보주체로부터 개인정보를 수집 시에 동의받은 개인정보 보유·이용기간 내에서 개인정보를 처리·보유합니다.</div>
                                    <div class="text-list-item">각각의 개인정보 처리 및 보유 기간은 다음과 같습니다.<br>홈페이지 회원가입 및 서비스 이용과 관련한 개인정보는 수집.이용에 관한 동의일로부터&lt;3년&gt;까지 위이용목적을 위하여 보유.이용됩니다.<br>- 보유근거 : 서비스 관련 분쟁 처리<br>- 관련법령 :<br>① 신용정보의 수집/처리 및 이용 등에 관한 기록 : 3년<br>② 소비자의 불만 또는 분쟁처리에 관한 기록 : 3년<br>③ 대금결제 및 재화 등의 공급에 관한 기록 : 5년<br>④ 계약 또는 청약철회 등에 관한 기록 : 5년<br>⑤ 표시/광고에 관한 기록 : 6개월</div>
                                    <div class="text-list-item">회원이 1년 간 서비스 이용기록이 없는 경우 「개인정보보호법」제 39조의6에 근거하여 회원에게 사전 통지하고 별도로 분리하여 저장합니다. 이 때 전화번호 또는 이메일 등의 정보가 정확하지 않을 경우 해당 정보를 수신할 수 없으므로 17조 이용자의 권리와 의무 에서와 같이 항상 정확성, 최신성을 유지하여 주시기 바랍니다. 단, 상기 나.항 기재 법률 등 관계 법령의 규정에 의하여 보존이 필요할 경우 관계 법령에서 규정한 기간 동안 보관합니다.</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제5조 (개인정보의 제3자 제공에 관한 사항)</h3>
                            <div class="terms-sentence">
                                <div class="text-list">
                                    <div class="text-list-item">다섯달란트는 고객님의 개인정보를 가입신청서, 서비스이용약관, 「개인정보처리방침」의 「개인정보의 수집 및 이용목적」에서 알린 범위 내에서 사용하며, 이 범위를 초과하여 이용하거나 타인 또는 다른 기업 · 기관에 제공하지 않습니다. 단, 고객의 동의가 있거나 법령에 의하여 정해진 절차에 따라 정보를 요청받은 경우는 예외로 하며, 이 경우 주의를 기울여 개인정보를 이용 및 제공할 수 있습니다.</div>
                                    <div class="text-list-item">개인정보 제3자 제공 동의</div>
                                </div>
                            </div>
                            <table class="terms-table">
                                <colgroup>
                                    <col style="width:25%"/>
                                    <col style="width:25%"/>
                                    <col style="width:25%"/>
                                    <col style="width:25%"/>
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>개인정보를 제공받는 자</th>
                                    <th>개인정보를 제공받는 자의 개인정보 이용목적</th>
                                    <th>제공하는 개인정보의 항목</th>
                                    <th>개인정보를 제공받는 자의 개인정보 보유 및 이용기간</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>상담사</td>
                                    <td>그림 분석 상담 진행 및 심리 분석 결과 보고서 작성</td>
                                    <td>아이 이름, 생년월일</td>
                                    <td>이용 목적 달성 시 까지</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>


                        <div class="terms-group">
                            <h3>제6조 (개인정보의 수집, 이용, 제공에 대한 동의철회)</h3>
                            <div class="terms-sentence">
                                <div class="text-list">
                                    <div class="text-list-item">회원가입 등을 통한 개인정보의 수집, 이용, 제공과 관련해 귀하는 동의하신 내용을 언제든지 철회 하실 수 있습니다. 동의 철회는 마이페이지  앱 설정에서 "회원탈퇴"를 클릭하면 개인정보의 수집ㆍ이용ㆍ제공에 대한 동의를 바로 철회할 수 있으며, 개인정보보호책임자에게 서면, 전화, 이메일(E-mail) 등으로 연락하시면 회사는 즉시 회원 탈퇴를 위해 필요한 조치를 취합니다. 동의를 철회하고 개인정보를 파기하는 등의 조치가 있으면 그 사실을 귀하께 지체없이 통지하도록 하겠습니다. "이용자가 본인의 개인정보 요구에 대한 거절 등의 조치에 대하여 불복이 있는 경우 개인정보 관련 고객센터를 통해 이의를 제기하실수 있습니다."</div>
                                    <div class="text-list-item">다섯달란트는 개인정보의 수집에 대한 동의철회(회원탈퇴)를 개인정보를 수집하는 방법보다 쉽게 할 수 있도록 필요한 조치를 취합니다.</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제7조 (개인정보의 파기절차 및 파기방법)</h3>
                            <div class="terms-sentence">
                                다섯달란트는 개인정보 보유기간의 경과, 처리목적 달성 등 개인정보가 불필요하게 되었을 때에는 지체없이 해당 개인정보를 파기합니다.<br>
                                <div class="text-list">
                                    <div class="text-list-item">파기절차 및 시점<br>이용자가 서비스 가입 등을 위해 기재한 개인정보는 서비스 해지 등 이용목적이 달성되고 나면 내부 방침과 기타 관련 법령의 정보보호 사유(위 개인정보의 보유 및 이용기간 참조)에 따른 보유 기간이 지난 후에 삭제되거나 파기합니다. 일반적으로 채권-채무 관계가 남아 있지 않으면 다섯달란트 회원가입 때 수집되어 전자적 파일형태로 관리하는 개인정보는 회원 탈퇴 시점에 바로 삭제 됩니다.</div>
                                    <div class="text-list-item">파기방법<br>전자적 파일 형태의 정보는 기록을 재생할 수 없는 기술적 방법을 사용합니다.</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제8조 (비회원 개인정보보호)</h3>
                            <div class="terms-sentence">
                                다섯달란트는 비회원 무료 검사 시 상담 분석에 필요한 개인정보만을 요청합니다. 이때 해당 정보는 상담 분석과 관련된 용도로 사용되며 그 밖에 용도로는 절대 사용되지 않습니다.
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제9조 (아동의 개인정보보호)</h3>
                            <div class="terms-sentence">
                                다섯달란트는 만14세 미만 아동의 개인정보를 보호하기 위하여 회원가입은 만14세 이상에만 허용하여 아동의 개인정보를 수집하지 않습니다.
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제9조 (아동의 개인정보보호)</h3>
                            <div class="terms-sentence">
                                다섯달란트는 만14세 미만 아동의 개인정보를 보호하기 위하여 회원가입은 만14세 이상에만 허용하여 아동의 개인정보를 수집하지 않습니다.
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제10조 (개인정보 처리 업무의 위탁)</h3>
                            <div class="terms-sentence">
                                <div class="text-list">
                                    <div class="text-list-item">
                                        다섯달란트는 기본적인 서비스 제공, 더 나은 서비스 제공, 고객편의 제공 등 원활한 업무 수행을 위하여 다음과 같이 개인정보 처리 업무를 외부전문업체에 위탁하여 운영하고 있습니다.
                                        <table class="terms-table">
                                            <colgroup>
                                                <col style="width:33.33%"/>
                                                <col style="width:33.33%"/>
                                                <col style="width:33.33%"/>
                                            </colgroup>
                                            <thead>
                                            <tr>
                                                <th>수탁자</th>
                                                <th>위탁 사무 및 목적</th>
                                                <th>보유 및 이용기간</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>코리아크레딧뷰로(주)</td>
                                                <td>회원가입에 따른 본인확인 (실명, 휴대전화 인증, PASS 인증 등)</td>
                                                <td>본인확인 기관이 이들 기관에서 이미 보유한 개인정보이므로 별도로 저장하지 않음</td>
                                            </tr>
                                            <tr>
                                                <td>(주)다날</td>
                                                <td>신용카드 결제승인 및 매입업무 대행</td>
                                                <td>회원 탈퇴 및 위탁 계약 만료 때 까지</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="text-list-item">다섯달란트는 위탁업무계약서 등을 통하여 개인정보보호 관련 법규의 준수, 개인정보에 관한 비밀유지, 개인정보의 제3자 제공 금지, 사고시의 책임 부담, 위탁기간, 처리 종료 후의 개인정보의 반환 또는 파기의무 등을 규정하고, 이를 지키도록 관리하고 있습니다.</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제11조 (개인정보 처리방침의 고지 또는 통지방법)</h3>
                            <div class="terms-sentence">
                                <div class="text-list">
                                    <div class="text-list-item">다섯달란트는 고객이 동의한 범위를 넘어 고객의 개인정보를 이용하거나 제3자에게 제공하기 위해 고객에게서 추가적인 동의를 얻고자 할 때에는 미리 고객에게 개별적으로 이메일(E- mail), 전화 등으로 해당사항을 알립니다.</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제12조 (개인정보의 안전성 확보조치에 관한 사항)</h3>
                            <div class="terms-sentence">
                                다섯달란트는 개인정보의 안전성 확보를 위해 다음과 같은 조치를 취하고 있습니다.<br>
                                <div class="text-list">
                                    <div class="text-list-item">개인정보 취급 직원의 최소화 및 교육<br>개인정보를 취급하는 직원을 지정하고 담당자에 한정시켜 최소화 하여 개인정보를 관리하는 대책을 시행하고 있습니다.</div>
                                    <div class="text-list-item">개인정보의 암호화<br>이용자의 비밀번호는 암호화 되어 저장 및 관리되고 있어, 본인만이 알 수 있으며 중요한 데이터는 파일 및 전송 데이터를 암호화 하거나 파일 잠금 기능을 사용하는 등의 별도 보안기능을 사용하고 있습니다.</div>
                                    <div class="text-list-item">개인정보에 대한 접근 제한<br>개인정보를 처리하는 데이터베이스시스템에 대한 접근권한의 부여,변경,말소를 통하여 개인정보에 대한 접근통제를 위하여 필요한 조치를 하고 있으며 침입차단시스템을 이용하여 외부로부터의 무단 접근을 통제하고 있습니다.</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제13조 (개인정보를 자동으로 수집하는 장치의 설치·운영 및 그 거부에 관한 사항)</h3>
                            <div class="terms-sentence">
                                <div class="text-list">
                                    <div class="text-list-item">다섯달란트는 이용자에게 개별적인 맞춤서비스를 제공하기 위해 이용정보를 저장하고 수시로 불러오는 ‘쿠키(cookie)’를 사용할 수 있습니다.</div>
                                    <div class="text-list-item">쿠키는 웹사이트를 운영하는데 이용되는 서버(http)가 이용자의 컴퓨터 브라우저에게 보내는 소량의 정보이며 이용자들의 PC 컴퓨터내의 하드디스크에 저장되기도 합니다.<br>① 쿠키의 사용 목적 : 이용자가 방문한 각 서비스와 웹 사이트들에 대한 방문 및 이용형태, 인기 검색어, 보안접속 여부, 등을 파악하여 이용자에게 최적화된 정보 제공을 위해 사용됩니다.<br>② 쿠키의 설치•운영 및 거부 : 웹브라우저 상단의 도구&gt;인터넷 옵션&gt;개인정보 메뉴의 옵션 설정을 통해 쿠키 저장을 거부 할 수 있습니다.<br>③ 쿠키 저장을 거부할 경우 맞춤형 서비스 이용에 어려움이 발생할 수 있습니다.</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제14조 (추가적인 이용·제공 판단기준)</h3>
                            <div class="terms-sentence">
                                다섯달란트는 ｢개인정보 보호법｣ 제15조제3항 및 제17조제4항에 따라 ｢개인정보 보호법 시행령｣ 제14조의2에 따른 사항을 고려하여 정보주체의 동의 없이 개인정보를 추가적으로 이용·제공할 수 있습니다.<br>
                                이에 따라 다섯달란트는 정보주체의 동의 없이 추가적인 이용·제공을 하기 위해서 다음과 같은 사항을 고려하였습니다.<br>
                                ① 개인정보를 추가적으로 이용·제공하려는 목적이 당초 수집 목적과 관련성이 있는지 여부<br>
                                ② 개인정보를 수집한 정황 또는 처리 관행에 비추어 볼 때 추가적인 이용·제공에 대한 예측 가능성이 있는지 여부<br>
                                ③ 개인정보의 추가적인 이용·제공이 정보주체의 이익을 부당하게 침해하는지 여부<br>
                                ④ 가명처리 또는 암호화 등 안전성 확보에 필요한 조치를 하였는지 여부
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제15조 (개인정보 보호책임자에 관한 사항)</h3>
                            <div class="terms-sentence">
                                <div class="text-list">
                                    <div class="text-list-item">다섯달란트 은(는) 개인정보 처리에 관한 업무를 총괄해서 책임지고, 개인정보 처리와 관련한 정보주체의 불만처리 및 피해구제 등을 위하여 아래와 같이 개인정보 보호책임자를 지정하고 있습니다.<br>▶ 개인정보 보호책임자<br>성명 :진재연<br>직급 :대표<br>연락처 :070-7566-0902, support@5dalant.net<br>▶ 개인정보 보호 담당부서<br>부서명 :운영기획<br>담당자 :신수연<br>연락처 :070-7566-0902, support@5dalant.net</div>
                                    <div class="text-list-item">타 개인정보 침해에 관한 상담이 필요한 경우에는 한국인터넷진흥원 개인정보침해신고센터, 경찰청 사이버테러대응센터 등으로 문의하실 수 있습니다.<br>- 개인정보침해신고센터 : (국번없이)118 (http://privacy.kisa.or.kr)<br>- 개인정보 분쟁조정위원회 : 1833-6972(http://kopico.go.kr)<br>- 대검찰청 사이버수사과 : (국번없이)1301, cid@spo.go.kr (http://spo.go.kr)<br>- 경찰청 사이버수사국 : (국번없이)182 (https://ecrm.cyber.go.kr)</div>
                                </div>
                            </div>
                        </div>
                        <div class="terms-group">
                            <h3>제16조 (개인위치정보 수집·이용·제공 등에 관한 사항)</h3>
                            <div class="terms-sentence">
                                <div class="text-list">
                                    <div class="text-list-item">다섯달란트는 위치기반서비스사업자의 지위로서 고객님의 위치정보를 수집하고 있으며, 본 서비스에서 고객님의 위치정보를 기반으로 각종 서비스를 제공하고 있습니다.</div>
                                    <div class="text-list-item">인위치정보의 처리목적 및 보유기간</div>
                                </div>
                            </div>
                            <table class="terms-table">
                                <colgroup>
                                    <col style="width:33.33%"/>
                                    <col style="width:33.33%"/>
                                    <col style="width:33.33%"/>
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>구분</th>
                                    <th>처리목적</th>
                                    <th>보유 및 이용기간</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>위치기반서비스<br>(핸드폰 GPS)</td>
                                    <td>이용자의 위치정보를 기반으로 적합한 인근 상담센터 제공</td>
                                    <td>위치 안내 후 별도로 저장하지 않음</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="terms-group">
                            <h3>제17조(개인정보 처리방침 변경)</h3>
                            <div class="terms-sentence">① 이 개인정보처리방침은 2022년 12월 27부터 적용됩니다.</div>
                        </div>

                    </div>
                </div>
                <!-- //20221226 수정 -->
            </div>
            <div class="page-bottom-ui"><a id="nextButton" class="btn btn-orange btn-large-size btn-page-action disabled">다음으로</a></div>
        </div>
    </div>
</section>
<script>
    function allAgree() {
        if ($("#allChecked").is(":checked")) {
            $(".check-agree-checkbox").prop('checked',false);
        } else {
            $(".check-agree-checkbox").prop('checked',true);
        }
        checkNextButtonStatus();
    }
    function checked(id) {
        if ( $('#'+id).is(":checked") ) {
            $('#'+id).prop('checked',false);
        } else {
            $('#'+id).prop('checked',true);
        }

        $("#allChecked").prop("checked",checkAgreeStatus());
        checkNextButtonStatus();
    }
    function checkNextButtonStatus() {
        if (checkAgreeStatus()) {
            $("#nextButton").removeClass("disabled");
            $("#nextButton").attr("href",'/joinAuth');
            // $("#nextButton").attr("href",'javascript:phoneAuthSubmit()');
        } else {
            $("#nextButton").addClass("disabled");
            $("#nextButton").removeAttr("href");
        }
    }
    function checkAgreeStatus() {
        var praentChecked = ($("#allChecked").is(":checked")) ? 0 : 1;
        return $("input[class='check-agree-checkbox']:checked").length === $(".check-agree-checkbox").length - praentChecked;
    }
</script>
@include('/mobile/common/end')

